<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Subscription;
use App\Models\Plan;
use App\Models\Verification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    
        $admin = auth()->user();
        $user = $admin->user;
        $subscriptions = Subscription::with('plan')
        ->where('user_id', $user->id)
        ->get();
    return view('subscription', compact('user', 'subscriptions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'plan_id' => 'required|integer',
            'payment_method' => 'required|string',
            'full_name' => 'required|string',
            'card_no' => 'required|string',
            'expiration' => 'required|string',
            'security_code' => 'required|string',
        ]);
    
        $admin = auth()->user();
        $user = $admin->user;
        $plan_id = $request->input('plan_id');
        $plan = Plan::find($request->plan_id);
        // dd($plan);
        if($plan->duration =="Monthly"){
            $end_date = now()->addMonth();
        }elseif($plan->duration =="Yearly"){
            $end_date = now()->addYear();
        }elseif("Weekly"){
            $end_date = now()->addWeek();
        }
    
        Log::info('Plan ID: ' . $request->input('plan_id'));
            $Subscription = new Subscription();
            $Subscription->user_id =$user->id;
            $Subscription->plan_id =$plan_id;
            $Subscription->end_date =$end_date;
            $Subscription->status =1;
            $Subscription->save();
 
        $user->update([
            'payment_method' => $request->payment_method,
        ]);
        
        $verification = Verification::where('user_id', $user->id)->latest()->first();
    //   dd( $verification);
    // Check the verify_code and redirect accordingly
            if (is_null($verification) || empty($verification->verify_code)) {
                return redirect()->route('verification_form', ['id' => $user->id]);
            } else {
                return redirect()->route('user.profile');
            }
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
