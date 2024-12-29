<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Advertise;
use App\Models\AdsSetting;
use App\Models\BoostedMember;
use App\Models\User;
use App\Models\Slider;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
class AdvertiseController extends Controller
{
    public function allAds()
    {
        $admin = auth()->user();
        $user = $admin->user;
        $advertisements = Advertise::where('title', 'approved')->paginate(10); // Fetching approved 
        $freeadvertisements = Advertise::where('title', 'approved')->where('ads_set',3)->get(); // Free
        $paidadvertisements = Advertise::where('title', 'approved')->where('ads_set',2)->paginate(10); //paid

        // dd($advertisements);
        return view('ads', compact('advertisements', 'user','paidadvertisements','freeadvertisements'));
    }
    
 

    public function createAds()
    {   $admin = auth()->user();
        $user = $admin->user;
        $advertisementsPlans = AdsSetting::where('ads_type','Paid_public_ads')->first();
        return view('create-ads', compact('user','advertisementsPlans'));
    }
   
   
    public function  userWebsite()
    {   $admin = auth()->user();
        $user = $admin->user;
        $sliders = Slider::latest()->take(5)->get();
        return view('my-website', compact('user','sliders'));
    } 
    public function  newsPortal()
    {   $admin = auth()->user();
        $user = $admin->user;
        $sliders = Slider::latest()->take(5)->get();
        return view('news-portal', compact('user','sliders'));
    } 
    public function  userSms()
    {   $admin = auth()->user();
        $user = $admin->user;
        if($user->role=='user'){
            $sliders = Slider::where('category', 'proPanel')->latest()->take(5)->get();
        }else{
            $sliders = Slider::where('category', 'companyPanel')->latest()->take(5)->get();
        }
        return view('sms-setting', compact('user','sliders'));
    }
    public function  bulkEmail()
    {   $admin = auth()->user();
        $user = $admin->user;
        $sliders = Slider::latest()->take(5)->get();
        return view('bulk-email', compact('user','sliders'));
    }
    public function  jobPost()
    {   $admin = auth()->user();
        $user = $admin->user;
        $sliders = Slider::latest()->take(5)->get();
        return view('job-post', compact('user','sliders'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'details' => 'required|string|max:50',
        ]);

        $admin = Auth::user();
        $user = $admin->user;
        $ads_set = AdsSetting::where('ads_type','Free_public_ads')->first();
        Advertise::create([
            'user_id' => $user->id,
            'ads_set' =>$ads_set->id, 
            'title' => 'pending', 
            'details' => $request->input('details'),
            'images' => Null, 
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->addDays(30),
        ]);

        return redirect()->back()->with('success', 'Ad created successfully.');
    }

   

    public function adsRequestsAdmin()
    {
        $admin = auth()->user();
        $user = $admin->user;
    
        // Fetch verifications with user relationship
        $pendingList = Advertise::where('title', 'pending')
            ->with('user') // Eager load the user relationship
            ->get();

    
    
        return view('admin.ads-list', compact('pendingList', 'user'));
    }

    public function show($id)
    {
        $ad = Advertise::findOrFail($id);
        return response()->json($ad);
    }

    public function approve(Request $request)
    {
        $adId = $request->input('adsId');
        $ad = Advertise::findOrFail($adId);
        $ad->title = 'approved';
        $ad->save();

        return redirect()->route('adsList')->with('success', 'Ad approved successfully.');
    }

    public function cancelledAds(Request $request)
    {
        $adId = $request->input('adsId');
    
        $ad = Advertise::findOrFail($adId);
        $ad->title = 'denied';
        $ad->save();
        return redirect()->route('adsList')->with('success', 'Ad denied successfully.');
    }
    public function adsPlanlist()
    {
        $admin = auth()->user();
        $user = $admin->user;
        $advertisementsPlans = AdsSetting::all(); // Fetching approved ads with pagination
        return view('admin.ads-plan-list', compact('advertisementsPlans', 'user'));
    }
    
    public function storeAdsPlan(Request $request)
    {
        $validatedData = $request->validate([
            'ads_type' => 'required|string|max:255',
            'payment' => 'required|numeric',
            'duration' => 'required|integer',
        ]);

        AdsSetting::create($validatedData);

        return redirect()->route('adsPlanlist')->with('success', 'Ads Plan added successfully.');
    }

    public function updateAdsPlan(Request $request)
    {
        $request->validate([
            'adsPlanId' => 'required|exists:ads_settings,id',
            'payment' => 'required|numeric',
            'duration' => 'required|integer',
        ]);

        $adsPlan = AdsSetting::find($request->adsPlanId);
        $adsPlan->payment = $request->payment;
        $adsPlan->duration = $request->duration;
        $adsPlan->save();

        return redirect()->back()->with('success', 'Ads plan updated successfully!');
    }



    public function checkout(Request $request)
    {
        $request->validate([
            'details' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'duration' => 'required|date',
            'price' => 'required',
        ]);

        // Process the uploaded image
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/ads'), $imageName);
        }
    
        // Store data in the session
        session([
            'ad_data' => [
                'details' => $request->input('details'),
                'image' => $imageName,
                'duration' => $request->input('duration'),
                
            ]
        ]);
    
        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));

    
        // Create a Stripe Checkout Session
        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => 'Advertisement Payment',
                    ],
                    'unit_amount' => $request->price * 100, // Amount in cents
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('advertise.storeAfterPayment'), // Store data after successful payment
            'cancel_url' => route('createAds'),
        ]);
    
        return redirect($session->url);
    }
    
    public function storeAfterPayment(Request $request)
    {
        $admin = auth()->user();
        $user = $admin->user;
    
        // Retrieve data from session
        $adData = session('ad_data');
        $ads_set = AdsSetting::where('ads_type','Paid_public_ads')->first();
        if ($adData) {
            Advertise::create([
                'user_id' => $user->id,
                'ads_set' => $ads_set->id,
                'title' => 'pending',
                'details' => $adData['details'],
                'images' => $adData['image'],
                'start_date' => Carbon::now(),
                'end_date' => $adData['duration'],
            ]);
    
            // Clear the session data after storing it
            session()->forget('ad_data');
    
            return redirect()->route('createAds')->with('success', 'Ad created successfully after payment.');
        }
    
        return redirect()->route('createAds')->with('error', 'Failed to create ad. Please try again.');
    }
    
// public function storeWithImage(Request $request)
// {
//     $request->validate([
//         'details' => 'required|string',
//         'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

//         'duration' => 'required|date',
//     ]);

//     $admin = Auth::user();
//     $user = $admin->user;

//     if ($request->hasFile('image')) {
//         $file = $request->file('image');
//         $imageName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
//         $file->move(public_path('images/ads'), $imageName);
//     }

//     Advertise::create([
//         'user_id' => $user->id,
//         'ads_set' => 2, 
//         'title' => 'pending', 
//         'details' => $request->input('details'),
//         'images' => $imageName, 
//         'start_date' => Carbon::now(),
//         'end_date' => $request->input('duration'),
//     ]);

//     return redirect()->back()->with('success', 'Ad created successfully.');
// }

public function accountBoost()
{
    $admin = auth()->user();
    $user = $admin->user; 

    if($user->role=='user'){
        $sliders = Slider::where('category', 'proPanel')->latest()->take(5)->get();
    }else{
        $sliders = Slider::where('category', 'companyPanel')->latest()->take(5)->get();
    }
    $advertisementsPlans = AdsSetting::where('ads_type', 'Paid_account_boosting')->first();

    // Retrieve existing boost requests for the user
    $boostRequests = BoostedMember::where('user_id', $user->id)
    ->orderByRaw("FIELD(status, 'pending') DESC")
    ->orderBy('created_at', 'desc')
    ->get();

    return view('account-boost', compact('sliders', 'advertisementsPlans', 'boostRequests'));
}

// public function boostRequest(Request $request)
// {
//     $request->validate([
//         'price' => 'required',
//         'end_date' => 'required|date',
//     ]);

//     $admin = auth()->user();
//     $user = $admin->user;

//     $boostId = AdsSetting::where('ads_type', 'Paid_account_boosting')->first();

//     if (!$boostId) {
//         return redirect()->back()->withErrors('Boosting plan not found.');
//     }

//     $boostRequest = new BoostedMember();
//     $boostRequest->user_id = $user->id; // Store the user ID correctly
//     $boostRequest->boost_id = $boostId->id;
//     $boostRequest->paid_amount = $request->input('price'); // Correct column to store price
//     $boostRequest->end_date = $request->input('end_date'); // Correct column to store end date
//     $boostRequest->status = 'pending'; // Set a default status, like 'pending'
//     $boostRequest->save();

//     return redirect()->back()->with('success', 'Boost Requested successfully!');
// }


public function boostRequest(Request $request)
{
    $request->validate([
        'price' => 'required|numeric',
        'end_date' => 'required|date',
    ]);

    // Get the user
    $admin = auth()->user();
    $user = $admin->user;

    // Create a new BoostedMember record temporarily to store in session
    $boostRequest = new BoostedMember();
    $boostRequest->user_id = $user->id; // Store the user ID
    $boostRequest->paid_amount = $request->input('price'); // Store price
    $boostRequest->end_date = $request->input('end_date'); // Store end date
    $boostRequest->status = 'pending'; // Default status

    // Store the boost request data in session
    session([
        'boost_request' => [
            'user_id' => $user->id,
            'price' => $request->input('price'),
            'end_date' => $request->input('end_date'),
        ]
    ]);

    // Set your Stripe API key (already handled in config)
    \Stripe\Stripe::setApiKey(config('services.stripe.secret'));

    // Create a Stripe Checkout Session
    $session = \Stripe\Checkout\Session::create([
        'payment_method_types' => ['card'],
        'line_items' => [[
            'price_data' => [
                'currency' => 'usd', // Change to your currency if needed
                'product_data' => [
                    'name' => 'Boost Request Payment',
                ],
                'unit_amount' => $request->price * 100, // Amount in cents
            ],
            'quantity' => 1,
        ]],
        'mode' => 'payment',
        'success_url' => route('boost.storeAfterPayment'), // Redirect to this route after payment
        'cancel_url' => route('accountBoost'), // Redirect back if payment is canceled
    ]);

    // Redirect to the Stripe checkout page
    return redirect($session->url);
}
public function boostStoreAfterPayment(Request $request)
{
    // Retrieve the stored boost request data from the session
    $boostData = session('boost_request');
// dd($boostData);
    if (!$boostData) {
        return redirect()->route('accountBoost')->withErrors('No boost request found.');
    }

    // Validate the retrieved data
    // $request->validate([
    //     'user_id' => 'required|exists:users,id',
    //     'end_date' => 'required|date',
    //     'price' => 'required|numeric',
    // ]);

    // Fetch boost setting
    $boostId = AdsSetting::where('ads_type', 'Paid_account_boosting')->first();

    if (!$boostId) {
        return redirect()->route('accountBoost')->withErrors('Boosting plan not found.');
    }

    // Create a new BoostedMember record
    $boostRequest = new BoostedMember();
    $boostRequest->user_id = $boostData['user_id']; 
    $boostRequest->boost_id = $boostId->id; 
    $boostRequest->paid_amount = $boostData['price']; 
    $boostRequest->end_date = $boostData['end_date']; 
    $boostRequest->status = 'active'; 
    $boostRequest->save();

    $formattedEndDate = Carbon::parse($boostRequest->end_date)->format('Y-m-d');
    $boostRequest->user->boost_end_at = $formattedEndDate; 
    $boostRequest->user->is_boosted = 1; 
    $boostRequest->user->save();
    // Clear the session data
    session()->forget('boost_request');

    return redirect()->route('accountBoost')->with('success', 'Boost Request completed successfully!');
}

//admin panel actions of account boost fo now these feature is not used coz of online payment system if
// we need admin permission system then we will active this again

public function showBoostRequests()
{
    $boostRequests = BoostedMember::with('user', 'boostSetting')
        ->orderByRaw("CASE WHEN status = 'pending' THEN 0 ELSE 1 END, status ASC") // Pending requests first
        ->get();

    return view('admin.boost-requests', compact('boostRequests'));
}

    // Approve a boost request
    public function approveBoostRequest(Request $request)
    {
        $boostRequest = BoostedMember::findOrFail($request->input('boostId'));
        
        // Update the status and any other necessary fields
        $boostRequest->status = 'active';
        $boostRequest->save();

        // Update the user's boost information
        $formattedEndDate = Carbon::parse($boostRequest->end_date)->format('Y-m-d');
        $boostRequest->user->boost_end_at = $formattedEndDate; // Assuming this field exists in User
        $boostRequest->user->is_boosted = 1; // Assuming this field exists in User
        $boostRequest->user->save();

        return redirect()->back()->with('success', 'Boost request approved successfully!');
    }

    // Deny a boost request
    public function denyBoostRequest(Request $request)
    {
        $boostRequest = BoostedMember::findOrFail($request->input('boostId'));
        
        // Update the status to inactive
        $boostRequest->status = 'inactive';
        $boostRequest->save();

        return redirect()->back()->with('success', 'Boost request denied successfully!');
    }
}
