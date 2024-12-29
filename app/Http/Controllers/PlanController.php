<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\User;
use App\Models\Slider;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Models\PaymentHistory;
use Illuminate\Support\Facades\Session;

class PlanController extends Controller
{
    public function index(Request $request)
    {
        $admin = auth()->user();
        $user = $admin->user;
    
        $subscription = Subscription::where('user_id', $user->id)->latest()->first();
        $currentPlan = null;
    
        if ($subscription) {
            $currentPlan = Plan::find($subscription->plan_id);
        }
    
        $monthlyPlans = Plan::where('duration', 'monthly')->get();
        $yearlyPlans = Plan::where('duration', 'yearly')->get();
        if($user->role=='user'){
            $sliders = Slider::where('category', 'proPanel')->latest()->take(5)->get();
        }else{
            $sliders = Slider::where('category', 'companyPanel')->latest()->take(5)->get();
        }
    
  
    
        return view('plans', compact('user', 'monthlyPlans', 'yearlyPlans', 'sliders', 'currentPlan', 'subscription'));
    }
    public function checkout(Request $request)
    {
        $plan_id = $request->query('plan_id');
        $price = $request->query('price');
        $product = $request->query('product');

        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));

        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $product,
                    ],
                    'unit_amount' => $price * 100, // Amount in cents
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('subscription.success', ['plan_id' => $plan_id]),
            'cancel_url' => route('plans', ['status' => 'failed']),
        ]);

        return redirect($session->url);
    }

    public function filterPlans(Request $request)
    {
        $duration = $request->input('duration');
        $plans = Plan::where('duration', $duration)->get();
    
        // Translate the plans data
        $translatedPlans = $plans->map(function($plan) {
            $plan->name = translate($plan->name);
            if ($plan->details) {
                $plan->details = collect(explode('•', $plan->details))
                    ->map(function($detail) {
                        return translate(trim($detail));
                    })->implode('•');
            }
            return $plan;
        });
    
        return response()->json($translatedPlans);
    }
    
    public function subscribe(Request $request)
    {
        $request->validate([
            'plan_id' => 'required', 
            'payment_method' => 'required', 
        ]);
        
        $plan_id = $request->input('plan_id');
        $payment = $request->input('payment_method');
        $plans = Plan::find($plan_id);

        if (!$plans) {
            return back()->withErrors(['subscription_error' => 'Selected plan does not exist.']);
        }

        $admin = auth()->user();
        $user = $admin->user;
        $duration = $plans->duration;

        // Set end date based on plan duration
        switch ($duration) {
            case "Monthly":
                $endDate = date('Y-m-d', strtotime("+30 days"));
                break;
            case "Yearly":
                $endDate = date('Y-m-d', strtotime("+365 days"));
                break;
            case "Weekly":
                $endDate = date('Y-m-d', strtotime("+7 days"));
                break;
            default:
                return back()->withErrors(['subscription_error' => 'Invalid plan duration specified.']);
        }

        // Check if endDate was set properly
        if (!isset($endDate)) {
            return back()->withErrors(['subscription_error' => 'Failed to set subscription end date.']);
        }

        // Store the subscription data
        $subscribe = new Subscription();
        $subscribe->user_id = $user->id;
        $subscribe->plan_id = $plan_id;
        $subscribe->end_date = $endDate;
        $subscribe->status = 1;
        $subscribe->save();

        // Update the user's subscription details
        $user->payment_method = $payment;
        $user->is_subscribed = 1;
        $user->end_date = $endDate;
        $user->save();

        return redirect()->route('dashboard');
    }


    public function success(Request $request)
    {
        $plan_id = $request->query('plan_id');
        $plans = Plan::find($plan_id);
        
        if (!$plans) {
            return redirect()->route('plans')->withErrors(['subscription_error' => 'Subscription plan not found.']);
        }
    
        $admin = auth()->user();
        $user = $admin->user;
        $duration = $plans->duration;
        
        if ($duration == "Monthly") {
            $endDate = now()->addDays(30)->toDateString();
        } elseif ($duration == "Yearly") {
            $endDate = now()->addDays(365)->toDateString();
        }elseif ($duration == "Weekly") {
            $endDate = now()->addDays(7)->toDateString();
        }
    
        // Store the subscription data
        $subscribe = new Subscription();
        $subscribe->user_id = $user->id;
        $subscribe->plan_id = $plan_id;
        $subscribe->end_date = $endDate;
        $subscribe->status = 1;
        $subscribe->save();
    
        // Update the user's subscription status
        $user->payment_method = 'stripe';
        $user->save();
    
        return redirect()->route('dashboard')->with('success', 'Subscription successful.');
    }
    

    public function showPlansByFeature($feature)
{
    $admin = auth()->user();
    $user = $admin->user; // Retrieve the actual user associated with the admin

    // Get all plans related to the feature where status is active
    $plans = Plan::where('feature', $feature)
                ->where('status', 1)
                ->get();

    // Filter out plans where the plan_id in subscriptions matches and the amount in plans is 0
    $filteredPlans = $plans->filter(function($plan) use ($user, $feature) {
        // Check if there is a subscription for the user where plan_id matches and the plan's feature matches
        $subscription = Subscription::where('user_id', $user->id)
            ->where('plan_id', $plan->id)
            ->whereHas('plan', function ($query) use ($feature) {
                $query->where('feature', $feature)  // Match feature in the plans table
                      ->where('amount', 0); // Match amount in the plans table
            })
            ->first();

        // If no such subscription is found, include this plan
        return !$subscription;
    });

    return view('feature_plans', ['plans' => $filteredPlans, 'feature' => $feature]);
}

public function paidSmsPlan($feature)
{
    $admin = auth()->user();
    $user = $admin->user; // Retrieve the actual user associated with the admin

    // Get all plans related to the feature where status is active
    $plans = Plan::where('feature', $feature)
                ->where('status', 1)
                ->get();

    // Filter out plans where the plan_id in subscriptions matches and the amount in plans is 0
    $filteredPlans = $plans->filter(function($plan) use ($user, $feature) {
        // Check if there is a subscription for the user where plan_id matches and the plan's feature matches
        $subscription = Subscription::where('user_id', $user->id)
            ->where('plan_id', $plan->id)
            ->whereHas('plan', function ($query) use ($feature) {
                $query->where('feature', $feature)  // Match feature in the plans table
                      ->where('amount', 0); // Match amount in the plans table
            })
            ->first();

        // If no such subscription is found, include this plan
        return !$subscription;
    });

    if($user->role=='user'){
        $sliders = Slider::where('category', 'proPanel')->latest()->take(5)->get();
    }else{
        $sliders = Slider::where('category', 'companyPanel')->latest()->take(5)->get();
    }

    return view('sms', ['plans' => $filteredPlans, 'feature' => $feature, 'sliders'=>$sliders]);
}
public function premiumFeature(){

    return view('paid-features');
}


public function walletCheckout(Request $request)
{
    $admin = auth()->user();
    $user = $admin->user;
    $price = $request->query('amount');

    \Stripe\Stripe::setApiKey(config('services.stripe.secret'));

    $session = \Stripe\Checkout\Session::create([
        'payment_method_types' => ['card'],
        'line_items' => [[
            'price_data' => [
                'currency' => 'CHF',
                'product_data' => [
                    'name' => $user->first_name . " " . $user->last_name,
                ],
                'unit_amount' => $price * 100, // Amount in cents
            ],
            'quantity' => 1,
        ]],
        'mode' => 'payment',
        'success_url' => route('wallet.success') . '?session_id={CHECKOUT_SESSION_ID}', // Corrected
        'cancel_url' => route('walletdetails', ['status' => 'failed']),
    ]);

    return redirect($session->url);
}


public function walletSuccess(Request $request)
{
    $sessionId = $request->query('session_id');
    
    \Stripe\Stripe::setApiKey(config('services.stripe.secret'));

    $session = \Stripe\Checkout\Session::retrieve($sessionId);
    
    if ($session->payment_status === 'paid') {
        $amount = $session->amount_total / 100; // Convert from cents to dollars

        $admin = auth()->user();
        $user = $admin->user;

        // Update user wallet balance
        $user->wallet += $amount;
        $user->save();

        // Store payment history
        PaymentHistory::create([
            'user_id' => $user->id,
            'payment_id' => $session->id, // Stripe session ID
            'wallet_name' => 'Stripe Wallet', // Or other relevant name
            'amount' => $amount,
            'currency' => $session->currency, // Currency from session
            'status' => $session->payment_status, // Payment status
            'payment_details' => json_encode($session), // Store full session details as JSON
        ]);

        return redirect()->route('walletdetails')->with('success', 'Wallet recharged successfully!');
    }

    return redirect()->route('walletdetails')->with('error', 'Payment not successful.');
}

}
