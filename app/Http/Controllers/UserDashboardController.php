<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Country;
use App\Models\Language;
use App\Models\Chat;
use App\Models\Friend;
use App\Models\Slider;
use App\Models\Patient;
use App\Models\Booking;
use App\Models\Expertise;
use App\Models\FaqQuestion;
use App\Models\FaqAnswer;
use App\Models\Specialty;
use App\Models\Partner;
use App\Models\Admin;
use App\Models\Disease;
use App\Models\Canton; 
use App\Models\MemberTitle;
use App\Models\MemberGroup;
use App\Models\Verification;
use App\Models\NecessaryCategory;
use App\Models\NecessaryUrl;
use App\Models\PaymentHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserDashboardController extends Controller
{

    public function index() {
        $admin = auth()->user();
        $user = $admin->user;
        $message = null;
        $bookings = Booking::where('user_id', $user->id)->get();
    
        if ($bookings->isEmpty()) {
            $message = "No online users available.";
        }
        $remote = $bookings->where('payment_method', 'remote')->count();
        $onsite = $bookings->where('payment_method', 'onsite')->count();
        $totalCount = Booking::where('user_id', $user->id)->count();
        if($user->role=='user'){
            $sliders = Slider::where('category', 'proPanel')->latest()->take(5)->get();
        }else{
            $sliders = Slider::where('category', 'companyPanel')->latest()->take(5)->get();
        }
        
		$bokingsCountG = $bookings->groupBy('pt_id')->map(function($values) {
					    		return $values->count();
							})->sort()->reverse();
		$unique_count = 0;
		$duplicate_count = 0;
		foreach($bokingsCountG as $countb)
		{
			if($countb > 1)
			{
				$duplicate_count += $countb;
			}else
			{
				$unique_count += $countb;
			}
			//echo $countb.'<br>';
		}
        
        $count_percent_1 = 0;
        $count_perce_1_2 = 0;
        if($duplicate_count > 0)
        {
        	$count_percent_1 = ($duplicate_count/$totalCount)*100;
        	$count_perce_1_2 = 100-$count_percent_1;
        }
        
        $count_percent_2 = 0;
        $count_perce_2_2 = 0;
        if($unique_count > 0)
        {
        	$count_percent_2 = ($unique_count/$totalCount)*100;
        	$count_perce_1_2 = 100-$count_percent_2;
        }
        
        $hostId = $user->id;
        $memberUserIds = MemberGroup::where('host_id', $hostId)->pluck('user_id');
        
        $bookingsGroup = Booking::whereIn('user_id', $memberUserIds)
                        ->whereNull('booking_status')
                        ->get();

        $pendingGroupCount = Booking::whereIn('user_id', $memberUserIds)
            ->whereNull('booking_status')
            ->count();

        $completedGroupCount = Booking::whereIn('user_id', $memberUserIds)
            ->where('booking_status', 'completed')
            ->count();
		$remotebooking = Booking::with(['patient:id,first_name', 'specialty:id,name'])->select('id', 'booking_date')
				            ->whereDate('booking_date', '>', now()->subWeek())
				            ->where('user_id', $user->id)
				            ->where('payment_method', 'remote')
				            ->orderBy('booking_date','Desc')
				            ->get()
				            ->groupBy(function($date) {
				                return Carbon::parse($date->booking_date)->format('l');
				            });
		//dd(now()->subWeek());
		$remote_array = array();
		
		
		foreach($remotebooking as $index => $bookingremote)
		{
			$remote_array[] = array(
								   	'dayname' => $index,
								   	'count'	  => count($bookingremote),
								   );
		}
		
		
		$onsitebooking = Booking::with(['patient:id,first_name', 'specialty:id,name'])->select('id', 'booking_date')
				            ->whereDate('booking_date', '>', now()->subWeek())
				            ->where('user_id', $user->id)
				            ->where('payment_method', 'onsite')
				            ->orderBy('booking_date','Desc')
				            ->get()
				            ->groupBy(function($date) {
				                return Carbon::parse($date->booking_date)->format('l');
				            });
		//dd(now()->subWeek());
		$onsite_array = array();
		
		
		foreach($onsitebooking as $index => $bookingonsite)
		{
			$onsite_array[] = array(
								   	'dayname' => $index,
								   	'count'	  => count($bookingonsite),
								   );
		}
        $receivedGroupCount = Booking::where('user_id', $user->id)->count();
        return view('dashboard', compact('user', 'sliders', 'remote', 'onsite', 'totalCount', 'message','bookingsGroup','pendingGroupCount','completedGroupCount','receivedGroupCount','count_percent_2','count_percent_1','count_perce_1_2','count_perce_2_2','remote_array','onsite_array'));
    }

    public function startMeet(Request $request) {
    $admin = auth()->user();
    $user = $admin->user;
    $updateAds = User::where('id', $user->id)->first();
    $updateAds->adds_points = 0; 
    $updateAds->save();
    $chatusers = Chat::where(function($query) use ($user) {
                        $query->where('caller_id', $user->id)
                            ->orWhere('receiver_id', $user->id);
                    })
                    ->whereIn('status', ['pending', 'active'])
                    ->first();

    if ($chatusers) {
        $meetingId = $chatusers->room_id;
        return view('meet', [
            'room' => $meetingId,
            'create' => true,
            'name' => $user->first_name. ' '.$user->last_name,
            'avatar' => $user->profile_pic ? asset('images/users/' . $user->profile_pic) : ''

        ]);
        
    }
   
}

public function adsPoints(){
    $admin = auth()->user();
    $user = $admin->user;
    $updateAds = User::where('id', $user->id)->first();

    if ($updateAds) {
        $updateAds->adds_points = 1; 
        $updateAds->save();

        return response()->json(['success' => true]);
    } else {
        return response()->json(['success' => false, 'message' => 'User not found'], 404);
    }
}

public function makeCall(Request $request) {
    $receiver_id = $request->input('receiver_id');
    $admin = auth()->user();
    $user = $admin->user;
    if($user->is_subscribed == 1 OR $user->adds_points >0) {
        $existingChat = Chat::where(function ($query) use ($user, $receiver_id) {
                            $query->where('caller_id', $user->id)
                                  ->orWhere('receiver_id', $user->id)
                                  ->orWhere('caller_id', $receiver_id)
                                  ->orWhere('receiver_id', $receiver_id);
                        })
                        ->whereIn('status', ['pending', 'active'])
                        ->first();
                        
                        $user->save();
        if (!$existingChat) {
            $meetingId = implode('-', str_split(substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyz'), 0, 9), 3));
            $chat = new Chat();
            $chat->caller_id = $user->id; 
            $chat->receiver_id = $receiver_id; 
            $chat->room_id = $meetingId;
            $chat->save(); 
        } else {
            return response()->json(['message' => 'User is busy.']);
        }

    } else {
        return response()->json(['redirect_url' => route('plans')]);
    }
}
public function searchFriends(Request $request)
{
    $usersQuery = User::with(['timeSlots' => function ($query) {
        $query->where('date', '>=', now());
    }]);

    if ($request->filled('specialties')) {
        $specialties = urldecode($request->input('specialties'));
        $specialtiesArray = explode(',', $specialties);

        $usersQuery->where(function ($query) use ($specialtiesArray) {
            foreach ($specialtiesArray as $specialty) {
                $query->orWhereRaw("FIND_IN_SET(?, specialties)", [trim($specialty)]);
            }
        });
    }

    if ($request->filled('city')) {
        $city = $request->input('city');
        $usersQuery->where('city', $city);
    }

    if ($request->filled('filter_date')) {
        $filterDate = $request->input('filter_date');
        $usersQuery->whereDate('created_at', $filterDate);
    }

    $perPage = 10;
    $users = $usersQuery->paginate($perPage);

    return response()->json($users);
}

public function inviteFriends($encryptedUserId)
{
    $admin = auth()->user();
    $user = $admin->user;
    
    try {
        $userId = decrypt($encryptedUserId);
        $chatuser = User::find($userId);
        
        if (!$chatuser) {
            \Log::warning('User not found for ID: ' . $userId);
            throw new \Exception("User not found");
        }
        
        $countryName = optional(Country::find($chatuser->country))->name ?? 'Unknown';
        $languageName = optional(Language::find($chatuser->language))->name ?? 'Unknown';
        
        return view('match-details', compact('user', 'chatuser', 'languageName', 'countryName'));
        
    } catch (\Exception $e) {
        \Log::error('Error in inviteFriends: ' . $e->getMessage());
        return response()->view('errors.404', [], 404); 
    }
}

    public function doctorPanelBooking(){
        $admin = auth()->user();
        $user = $admin->user;
        return view('/booking',compact('user'));
    }
    public function doctorBookingHistory(){
        $admin = auth()->user();
        $user = $admin->user;
        return view('booking-history',compact('user'));
    }
    public function syncApps(){
        $admin = auth()->user();
        $user = $admin->user;
        $partners = Partner::all();
        $categories = NecessaryCategory::all();
        if($user->role=='user'){
            $sliders = Slider::where('category', 'proPanel')->latest()->take(5)->get();
        }else{
            $sliders = Slider::where('category', 'companyPanel')->latest()->take(5)->get();
        }
        $categories = NecessaryCategory::all();
        $randomLists = NecessaryUrl::with('necessarySliders')
                            ->inRandomOrder()
                            ->limit(15)
                            ->get();
         if($user->role=='user'){
            $sliders = Slider::where('category', 'proPanel')->latest()->take(5)->get();
        }else{
            $sliders = Slider::where('category', 'companyPanel')->latest()->take(5)->get();
        }                

        return view('sync-apps',compact('user','partners','sliders','categories', 'categories', 'randomLists','sliders'));
    }
    

    
    
    public function getservices(request $request)
    {
    	dd($request);
    }
    
    public function userProfile() {
        $admin = auth()->user();
        $user = $admin->user;
        $country = Country::find($user->country);
        $language = Language::find($user->language);
        $countryName = $country ? $country->name : null;
        $languageName = $language ? $language->name : null;
        $countries = Country::all();
        $specialties =Specialty::all();
        $diseases =Disease::all();
        $cantons = Canton::all();
        $titles = MemberTitle::all();
        $expertises = Expertise::all();
       
        return view('profile', [
            'user' => $user,
            'countryName' => $countryName,
            'languageName' => $languageName,
            'countries' => $countries,
            'cantons' => $cantons,
            'titles' => $titles,
            'specialties' => $specialties,
            'expertises' => $expertises,
            'diseases' =>  $diseases,
         
           
        ]);
    }
    
    
    
    public function updateProfile(Request $request)
    {
        $admin = auth()->user();
        $user = $admin->user;
        if($user->role=='user'){
            $request->validate([
                'first_name' => 'required|string|max:255',
                // 'last_name' => 'required|string|max:255',
                'title' => 'required|string|max:255',
                'email' => 'required|string|max:255',
                'web_url' => 'nullable|string',
                'phone' => 'nullable|string',
                'new_patient' => 'nullable|string',
                'gender' => 'required|in:male,female,other',
                'country'  => 'nullable|string',
                'language'  => 'nullable|array',
                'canton'  => 'nullable|string',
                'city'  => 'nullable|string',
                'address'  => 'nullable|string',
                'postal_code'  => 'nullable|string',
                'house_number'  => 'nullable|string',
                'age' => 'required|date_format:d.m.Y',
                'specialties' => 'nullable|string', 
                'speciality' => 'nullable|array',  
                'sxpertise' => 'nullable|array', 
                'hin_email'  => 'nullable|string',
                'fax_phone_number'  => 'nullable|string',
                'fax_number'  => 'nullable|string',
                'about_me' => 'nullable|string',
            ]);
            $languageString = $request->has('language') ? implode(',', $request->input('language')) : '';
            $specialtiesString = $request->has('speciality') ? implode(',', $request->input('speciality')) : '';
            $sxpertiseString = $request->has('sxpertise') ? implode(',', $request->input('sxpertise')) : '';
            $user->update([
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'email' => $request->input('email'),
                'gender' => $request->input('gender'),
                'age' => \Carbon\Carbon::createFromFormat('d.m.Y', $request->input('age'))->format('Y-m-d'),
                'country' => $request->input('country'),
                'language' => $languageString,
                'city' => $request->input('city'),
                'address' => $request->input('address'),
                'house_number' => $request->input('house_number'),
                'phone' => $request->input('phone'),
                'postal_code' => $request->input('postal_code'),
                'zip_code' => $request->input('canton'),
                'speciality' => $specialtiesString,
                'specialties' => $request->input('specialties'), 
                'sxpertise' => $sxpertiseString, 
                'about_me' => $request->input('about_me'),
                'patient_status' => $request->input('new_patient'),
                'title' => $request->input('title'),
                'hin_email' => $request->input('hin_email'),
                'fax_phone_number' => $request->input('fax_phone_number'),
                'fax_number' => $request->input('fax_number'),
                'web_url' => $request->input('web_url'),
            ]);

            return redirect()->back()->with('success', 'Profile updated successfully.');
        }elseif($user->role=='institute'){
            $request->validate([
                'first_name' => 'nullable|string|max:255',
                'title' => 'nullable|string|max:255',
                'email' => 'required|string|max:255',
                'zefix_ide' => 'nullable|string',
                'web_url' => 'nullable|string',
                'phone' => 'nullable|string',
                'new_patient' => 'nullable|string',
                'country'  => 'nullable|string',
                'language'  => 'nullable|array',
                'canton'  => 'nullable|string',
                'city'  => 'nullable|string',
                'address'  => 'nullable|string',
                'postal_code'  => 'nullable|string',
                'house_number'  => 'nullable|string',
                'age' => 'required|date_format:d.m.Y',
                'specialties' => 'nullable|string', 
                'speciality' => 'nullable|array',  
                'sxpertise' => 'nullable|array', 
                'hin_email'  => 'nullable|string',
                'fax_phone_number'  => 'nullable|string',
                'fax_number'  => 'nullable|string',
                'about_me' => 'nullable|string',
            ]);
            
            $languageString = $request->has('language') ? implode(',', $request->input('language')) : '';
            $specialtiesString = $request->has('speciality') ? implode(',', $request->input('speciality')) : '';
            $sxpertiseString = $request->has('sxpertise') ? implode(',', $request->input('sxpertise')) : '';
            $user->update([
                'first_name' => $request->input('first_name'),
                'email' => $request->input('email'),
                'gender' => $request->input('gender'),
                'age' => \Carbon\Carbon::createFromFormat('d.m.Y', $request->input('age'))->format('Y-m-d'),
                'country' => $request->input('country'),
                'language' => $languageString,
                'city' => $request->input('city'),
                'address' => $request->input('address'),
                'house_number' => $request->input('house_number'),
                'phone' => $request->input('phone'),
                'postal_code' => $request->input('postal_code'),
                'zip_code' => $request->input('canton'),
                'speciality' => $specialtiesString,
                'specialties' => $request->input('specialties'), 
                'sxpertise' => $sxpertiseString, 
                'about_me' => $request->input('about_me'),
                'patient_status' => $request->input('new_patient'),
                'title' => $user->role == 'institute' ? $request->input('title') : $user->title,
                'hin_email' => $request->input('hin_email'),
                'fax_phone_number' => $request->input('fax_phone_number'),
                'fax_number' => $request->input('fax_number'),
                'web_url' => $request->input('web_url'),
                'zefix_ide' => $request->input('zefix_ide'),
            ]);
        
            return redirect()->back()->with('success', 'Profile updated successfully.');
        }
       
    }
    
    
    public function checkPendingCalls(Request $request) {
        $admin = auth()->user();
        $user = $admin->user;
        $pendingCalls = Chat::where('receiver_id', $user->id)
                            ->where('status', 'pending')
                            ->get();
        
        return response()->json(['pendingCalls' => $pendingCalls]);
    }
    public function acceptCall(){
        $admin = auth()->user();
        $user = $admin->user;
        $acceptCall = Chat::where('receiver_id', $user->id)
                         ->where('status','pending')
                         ->first();
        if ($acceptCall) {
            $acceptCall->status = 'active'; 
            $acceptCall->save(); 
    
            return response()->json(['message' => 'success']);

        } else {

        }
    }
    
    
    public function rejectCall(){
        $admin = auth()->user();
        $user = $admin->user;
        $rejectCall = Chat::where(function ($query) use ($user) {
            $query->where('receiver_id', $user->id)
                  ->orWhere('caller_id', $user->id);
        })
        ->whereIn('status', ['pending', 'active'])
        ->first();
        if ($rejectCall) {
            $rejectCall->status = 'finished'; 
            $rejectCall->save(); 
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }

    public function updateLanguage(Request $request)
    {  
        $admin = auth()->user();
        $user = $admin->user;
        $request->validate([
            'language_id' => 'required|exists:languages,id',
        ]);
        $user->language = $request->input('language_id');
        $user->save();
    }
 
    public function updateOnlineStatus(Request $request)
    {  
    $admin = auth()->user();
    $user = $admin->user;
    $request->validate([
        'is_online' => 'required|boolean',
    ]);
    $user->is_online = $request->input('is_online');
    $user->save();
    }

    public function getCallHistory()
    {
        $admin = auth()->user();
        $user = $admin->user;
        $userId = $user->id;
    
        $callHistory = Chat::where('caller_id', $userId)
            ->orWhere('receiver_id', $userId)
            ->paginate(10);
    
        foreach ($callHistory as $call) {
            if ($call->receiver_id == $userId) {
                $chatUser = User::find($call->caller_id);
            } else {
                $chatUser = User::find($call->receiver_id);
            }
            $call->user = $chatUser;
        }
    
        return view('conversation-history', compact('user', 'callHistory'));
    }
    
    
    public function showVideoCallingView()
    {
        $admin = auth()->user();
        $user = $admin->user;
    
        return view('video-calling', ['user' => $user]);
    }
    public function uploadProfilePic(Request $request)
    {
    $request->validate([
        'profile_pic' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $admin = auth()->user();
    $user = $admin->user;

    if ($request->hasFile('profile_pic')) {
        $file = $request->file('profile_pic');
        $imageName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move('images/users', $imageName);

        // Update the profile_pic field in the users table
        $user->profile_pic = $imageName;
        $user->save();

        return response()->json([
            'success' => true,
            'profile_pic_url' => asset($user->profile_pic),
        ]);
    }

    return response()->json([
        'success' => false,
        'message' => 'No file uploaded.',
    ]);
}

    public function doctorTimeSlot(){
        $admin = auth()->user();
        $user = $admin->user;
        if($user->role=='user'){
            $sliders = Slider::where('category', 'proPanel')->latest()->take(5)->get();
        }else{
            $sliders = Slider::where('category', 'companyPanel')->latest()->take(5)->get();
        }
    return view('time-slot', ['user' => $user,'sliders'=> $sliders]);
    
    }

   
    public function doctorLocationUpdate(){
        $admin = auth()->user();
        $user = $admin->user;
        if($user->role=='user'){
            $sliders = Slider::where('category', 'proPanel')->latest()->take(5)->get();
        }else{
            $sliders = Slider::where('category', 'companyPanel')->latest()->take(5)->get();
        }
        return view('doctor-location', ['user' => $user,'sliders'=> $sliders]);
    
    }
    public function allomedSync(){
        $admin = auth()->user();
        $user = $admin->user;

    return view('allmed-ch', ['user' => $user]);
    
    }
    public function getPendingBookings() {
        $admin = auth()->user();
        $user = $admin->user;
        
        // Fetch direct bookings where user_id matches the authenticated user's ID
        $pendingBookings = Booking::with(['patient:id,first_name', 'specialty:id,name'])
                                  ->where('user_id', $user->id)  // Only fetch bookings for the authenticated user
                                  ->whereNull('booking_status')
                                  ->whereNull('status')
                                  ->orderBy('created_at', 'desc')
                                  ->take(10)
                                  ->get();
    
        return response()->json($pendingBookings);
    }
    
    
    public function getBookinglist(Request $request) {
        $admin = auth()->user();
        $user = $admin->user;
    
        $query = Booking::with(['patient:id,first_name', 'specialty:id,name'])
                        ->where('user_id', $user->id)
                        ->whereNull('booking_status')
                        ->whereNull('status');
    
        if ($request->has('date') && !empty($request->date)) {
            $query->whereDate('booking_date', $request->date);
        }
    
        $pendingBookings = $query->orderBy('created_at', 'desc')->get();
    
        return response()->json($pendingBookings);
    }
    public function getBookingHistory(Request $request) {
        $admin = auth()->user();
        $user = $admin->user;
    
        $query = Booking::with(['patient:id,first_name', 'specialty:id,name'])
                        ->where('user_id', $user->id);
    
        if ($request->has('date') && !empty($request->date)) {
            $query->whereDate('booking_date', $request->date);
        }
    
        $bookingHistory = $query->orderBy('created_at', 'desc')->get();
    
        return response()->json($bookingHistory);
    }
    
    public function updateBookingStatus(Request $request) {
        $bookingId = $request->input('booking_id');
        $status = $request->input('status');
    
        $booking = Booking::find($bookingId); 
        if (!$booking) {
            return response()->json(['success' => false], 404);
        }
    
        $patient = Patient::find($booking->pt_id);
        $doctor = User::find($booking->user_id);
        $formattedTime = Carbon::parse($booking->from_time)->format('g:i A');
        if ($booking && $status == "accepted") {
            $booking->status = $status;
            $booking->booking_status = 'completed';
            $booking->save();
    
            $email = $patient->email;
            $subject = 'Appointment Confirmation From Dr. ' . $doctor->first_name;
            $data = [
                'doctor_name' => $doctor->first_name,
                'doctor_address' => $doctor->address,
                'patient_name' => $patient->first_name,
                'patient_email' => $patient->email, 
                'bookingDate' => $booking->booking_date,
                'fromTime' => $formattedTime,
                'url' => 'https://doctors.allomed.ch/login',
            ];
    
            Mail::send('emails.email-booking-confirm-template', $data, function ($message) use ($email, $subject) {
                $message->to($email)->subject($subject);
            });
            
            return response()->json(['success' => true]);
        } elseif ($booking && $status == "cancelled") {
            $booking->status = $status;
            $booking->booking_status = 'completed';
            $booking->save();
    
                $email = $patient->email;
                $subject = 'Appointment Request Update From Dr. ' . $doctor->first_name;
                $data = [
                    'doctor_name' => $doctor->first_name,
                    'doctor_address' => $doctor->address,
                    'patient_name' => $patient->first_name,
                    'patient_email' => $patient->email, 
                    'bookingDate' => $booking->booking_date,
                    'fromTime' => $formattedTime,
                    'url' => 'https://doctors.allomed.ch/login',
                ];
        
                Mail::send('emails.email-booking-reject-template', $data, function ($message) use ($email, $subject) {
                    $message->to($email)->subject($subject);
                });
    
            return response()->json(['success' => true]);
        }
    
        return response()->json(['success' => false], 404);
    }
    
    public function getBookingDetails($bookingId)
    {
        try {

            $booking = Booking::with('patient:id,first_name,gender')->findOrFail($bookingId);
            $patientDetails = $booking->patient;
            $patientFirstName = $patientDetails->first_name;
            $patientGender = $patientDetails->gender;
    
            return response()->json($booking);
        } catch (\Exception $e) {

            \Log::error('Error fetching booking details: ' . $e->getMessage());
    
            return response()->json(['error' => 'Failed to fetch booking details.'], 500);
        }
    }

    public function doctorFaq()
    {
        $admin = auth()->user();
        $user = $admin->user;
        $faqQuestions = FaqQuestion::all();
        $faqAnswers = FaqAnswer::where('user_id', $user->id)->get()->keyBy('faq_id');
        if($user->role=='user'){
            $sliders = Slider::where('category', 'proPanel')->latest()->take(5)->get();
        }else{
            $sliders = Slider::where('category', 'companyPanel')->latest()->take(5)->get();
        }
        return view('/faqs', compact('faqQuestions', 'faqAnswers', 'user', 'sliders'));
    }

    public function updateFaqs(Request $request)
    {
        $admin = auth()->user(); 
        $user = $admin->user; 
        foreach ($request->input('faq') as $faqId => $data) {
            $faqAnswer = FaqAnswer::updateOrCreate(
                ['faq_id' => $faqId, 'user_id' => $user->id],
                ['answer' => $data['answer'], 'status' => 1] 
            );
        }

        return redirect()->back()->with('success', 'FAQ answers updated successfully.');
    } 
    public function updateAddress(Request $request)
    {
        $request->validate([
            'address' => 'required|string|max:255',
        ]);

        $admin = auth()->user(); 
        $user = $admin->user; 

        $user = User::where('id', $user->id)->firstOrFail();
        $user->address = $request->address;
        $user->save();
        return redirect()->back()->with('success', 'Address updated successfully!');
    } 
    public function passwordview()
    {

        $admin = auth()->user(); 
        $user = $admin->user; 
        if($user->role=='user'){
            $sliders = Slider::where('category', 'proPanel')->latest()->take(5)->get();
        }else{
            $sliders = Slider::where('category', 'companyPanel')->latest()->take(5)->get();
        }
        return view('/password', compact('user', 'sliders'));
    } 
    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:6',
        ]);
        $admin = auth()->user(); 
        $user = $admin->user; 
        $admin = Admin::where('user_id',$user->id)->firstOrFail();
        if (!$admin || !Hash::check($request->old_password, $admin->password)) {
            return redirect()->back()->with('error', 'Old password didn\'t match.');
        }

        $admin->password = Hash::make($request->new_password);
        $admin->save();

        return redirect()->back()->with('success', 'Password updated successfully.');
    }


    
    public function sendEmails(Request $request)
    {
        $admin = auth()->user(); 
        $user = $admin->user; 
        $userEmail =$user->email;
        $emails = [];
    
        // Manually entered emails
        if ($request->filled('emails')) {
            $emails = array_map('trim', explode(',', $request->input('emails')));
        }
    
        // Uploaded CSV file
        if ($request->hasFile('csv_file')) {
            $file = $request->file('csv_file');
            $handle = fopen($file, 'r');
            // Assuming the first row contains headers, read it
            $headers = fgetcsv($handle, 1000, ',');
            while ($row = fgetcsv($handle, 1000, ',')) {
                $data = array_combine($headers, $row); // Combine headers with row data
                $email = trim($data['email']);
    
                // Validate the email format
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $emails[] = $email;
                }
            }
            fclose($handle);
        }
    
        $subject = $request->input('subject');
        $body = $request->input('body');
    
        // Send emails
        foreach ($emails as $email) {
            $data = ['body' => $body,
                    'first_name'=>$user->first_name,
                    'last_name'=>$user->last_name,
                    'title'=>$user->title,
                    'address'=>$user->address,
                    'email'=>$user->email,
                    ];
    
            Mail::send('emails.bulk-email', $data, function ($message) use ($email, $subject, $userEmail) {
                $message->to($email)->subject($subject)->replyTo($userEmail);
            });
        }
    
        return redirect()->back()->with('success', 'Emails sent successfully.');
    }

    public function getOnlineUsers()
    {
        $onlineUsers = User::where('is_online', true)->get();
    
        $data = $onlineUsers->map(function($user) {
            return [
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'is_online' => $user->is_online,
                'extension_code' => $user->extension_code
            ];
        });
    
        return response()->json([
            'status' => 'success',
            'data' => $data
        ], 200);
    }
/// User Advertisement
    public function useradvertisement(){
        $admin = auth()->user();
        $user = $admin->user;
        return view('user-advertisement',compact('user'));
    }

    public function coupon(){
        $admin = auth()->user();
        $user = $admin->user;
        return view('coupon',compact('user'));
    }

    public function walletdetails(){
        $admin = auth()->user();
        $user = $admin->user;
    
        // Fetch payment history for the user
        $paymentHistory = PaymentHistory::where('user_id', $user->id)->get();
    
        return view('wallet-details', compact('user', 'paymentHistory'));
    }
    public function userprofiledetail(){
        $admin = auth()->user();
        $user = $admin->user;
        return view('user-profile-detail',compact('user'));
    }
    
}
