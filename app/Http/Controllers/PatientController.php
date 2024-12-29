<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Country;
use App\Models\Language;
use App\Models\Canton;
use App\Models\Booking;
use App\Models\Slider;
use App\Models\FavoriteDoctor;
use App\Models\User;
use App\Models\Specialty;
use App\Models\City;
use App\Models\DoctorNetwork;
use App\Models\Review;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class PatientController extends Controller
{
    public function index() {
        $admin = auth()->user();
        $user = $admin->patient;
        $message = null;
        $bookings = Booking::where('pt_id', $user->id)->get();
        
        if ($bookings->isEmpty()) {
            $message = "No online users available.";
        }
    
        // Count the different statuses
        $pendingCount = $bookings->where('booking_status', null)->count();
        $completedCount = $bookings->where('booking_status', 'completed')->count();
        $cancelledCount = $bookings->where('booking_status', 'cancelled')->count();
        $rescheduledCount = $bookings->where('booking_status', 'rescheduled')->count();
        $receivedCount = Booking::where('user_id', $user->id)->count();
        
        $currentDateTime = now(); // Get the current date and time

        $latestBooking = Booking::where('pt_id', $user->id)
                                      ->with('user')
                                      ->whereNull('booking_status') // Get bookings with no status
                                      ->where('from_time', '>', $currentDateTime) // Filter out past bookings
                                      ->orderBy('from_time', 'asc') // Sort by the closest future booking
                                      ->first();
            // dd($latestBooking);
        // Fetch sliders
        $sliders = Slider::where('category', 'patientPanel')->latest()->take(5)->get();
    
        return view('patient.dashboard', compact(
            'user', 
            'sliders', 
            'pendingCount', 
            'completedCount', 
            'receivedCount', 
            'cancelledCount', 
            'rescheduledCount', 
            'message', 
            'latestBooking' 
        ));
    }
    
    public function getBookingsCurrentMonth()
    {
        $admin = auth()->user();
        $user = $admin->patient;
    
        $currentMonthStart = now()->startOfMonth(); // Start of the current month
        $currentMonthEnd = now()->endOfMonth(); // End of the current month
    
        // Get bookings for the current month where booking_status is null and format the dates
        $bookings = Booking::where('pt_id', $user->id)
                           ->whereNull('booking_status')
                           ->whereBetween('booking_date', [$currentMonthStart, $currentMonthEnd])
                           ->pluck('booking_date')
                           ->map(function($date) {
                                return \Carbon\Carbon::parse($date)->format('Y-m-d'); // Return date in 'YYYY-MM-DD' format
                           });
    
        return response()->json($bookings);
    }
    
    public function patientProfile() {
        $admin = auth()->user();
        $user = $admin->patient;
        $country = Country::find($user->country);
        $language = Language::find($user->language);
        $countryName = $country ? $country->name : null;
        $languageName = $language ? $language->name : null;
        $countries = Country::all();

        $cantons = Canton::all();

       
        return view('patient.profile', [
            'user' => $user,
            'countryName' => $countryName,
            'languageName' => $languageName,
            'countries' => $countries,
            'cantons' => $cantons,
         
           
        ]);
    }
    public function uploadProfilePatientPic(Request $request)
    {
    $request->validate([
        'profile_pic' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $admin = auth()->user();
    $user = $admin->patient;

    if ($request->hasFile('profile_pic')) {
        $file = $request->file('profile_pic');
        $imageName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move('images/patients', $imageName);

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


public function updatePatientProfile(Request $request)
{
    $admin = auth()->user();
    $user = $admin->patient;

    $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|string|max:255',
        'phone' => 'nullable|string',
        'gender' => 'required|in:male,female,other',
        'country'  => 'nullable|string',
        'language'  => 'nullable|array',
        'canton'  => 'nullable|string',
        'city'  => 'nullable|string',
        'address'  => 'nullable|string',
        'postal_code'  => 'nullable|string',
        'insurance_name'  => 'nullable|string',
        'insurance_number'  => 'nullable|string',
        'about_me'  => 'nullable|string',
        
    ]);
    $languageString = $request->has('language') ? implode(',', $request->input('language')) : '';
    $user->update([
        'first_name' => $request->input('first_name'),
        'last_name' => $request->input('last_name'),
        'email' => $request->input('email'),
        'country' => $request->input('country'),
        'city' => $request->input('city'),
        'address' => $request->input('address'),
        'postal_code' => $request->input('postal_code'),
        'language' => $languageString,
        'phone' => $request->input('phone'),
        'birth_date' => \Carbon\Carbon::createFromFormat('d.m.Y', $request->input('birth_date'))->format('Y-m-d'),
        'gender' => $request->input('gender'),
        'about_me' => $request->input('about_me'),
        'insurance_name' => $request->input('insurance_name'),
        'insurance_number' => $request->input('insurance_number'),
        
    ]);

    return redirect()->back()->with('success', 'Profile updated successfully.');
}
public function getPatientsPendingBookings() {
    $admin = auth()->user();
    $user = $admin->patient;

    $pendingBookings = Booking::with(['user:id,first_name,last_name', 'specialty:id,name'])
                              ->where('pt_id', $user->id)
                              ->orderByRaw("CASE 
                                  WHEN booking_status IS NULL THEN 1
                                  WHEN booking_status = 'rescheduled' THEN 2
                                  WHEN booking_status = 'completed' THEN 3
                                  WHEN booking_status = 'cancelled' THEN 4
                                  ELSE 5 
                                END")
                              ->orderBy('created_at', 'desc') // secondary sorting by date
                              ->take(10)
                              ->get();

    return response()->json($pendingBookings);
}

public function patientsBookingHistory(){
    $admin = auth()->user();
    $user = $admin->patient;
    return view('patient.patient-booking-history',compact('user'));
}
public function getPatientBookingHistory(Request $request) {
    $admin = auth()->user();
    $user = $admin->patient;

    $query = Booking::with(['user:id,first_name,last_name', 'specialty:id,name'])
                    ->where('pt_id', $user->id);

    if ($request->has('date') && !empty($request->date)) {
        $query->whereDate('booking_date', $request->date);
    }

    $bookingHistory = $query->orderBy('created_at', 'desc')->get();

    return response()->json($bookingHistory);
}


public function bookingCancelledByPatient(Request $request)
    {
        // Validate the request data
        $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'status' => 'required|in:cancelled',
        ]);

        // Find the booking by the provided booking ID
        $booking = Booking::find($request->booking_id);

        if ($booking) {
            // Update the booking status
            $booking->booking_status = 'cancelled';
            $booking->status = 'cancelled'; 
            $booking->author_by = 'patient';
            // Save the changes
            $booking->save();

            // Return success response
            return response()->json([
                'success' => true,
                'message' => 'Booking cancelled successfully.'
            ]);
        }

        // Return failure response if the booking was not found
        return response()->json([
            'success' => false,
            'message' => 'Booking not found.'
        ], 404);
    }


    public function addFavoriteDoctor(Request $request)
    {
        // Get the authenticated user and their patient record
        $admin = auth()->user();
        $patient = $admin->patient;

        // If no patient is associated with the authenticated user
        if (!$patient) {
            return response()->json([
                'success' => false,
                'message' => 'No patient record found.'
            ], 404);
        }

        // Validate the request data
        $request->validate([
            'doctor_id' => 'required|exists:users,id',  // Ensure the doctor exists
        ]);

        // Check if the doctor is already a favorite for this patient
        $existingFavorite = FavoriteDoctor::where('patient_id', $patient->id)
            ->where('doctor_id', $request->doctor_id)
            ->first();

        if ($existingFavorite) {
            return response()->json([
                'success' => false,
                'message' => 'This doctor is already in your favorites.'
            ], 400);
        }
        else{
            $favoriteDoctor = new FavoriteDoctor();
            $favoriteDoctor->patient_id = $patient->id;
            $favoriteDoctor->doctor_id = $request->doctor_id;
            $favoriteDoctor->save();
        }
        // Add the doctor to the FavoriteDoctor table
       

        // Return success response
        return response()->json([
            'success' => true,
            'message' => 'Doctor added to your favorites successfully.'
        ]);
    }



    public function listFavoriteDoctor(){

        $admin = auth()->user();
        $user = $admin->patient;
        $patientId = $user->id;
        $favoriteDoctors = FavoriteDoctor::where('patient_id', $patientId)
                                 ->where('status', 'active')
                                 ->with('doctor')
                                 ->get();

        return view('patient.favorite-members',compact('user','favoriteDoctors'));
    }

    public function doctorAvailability($doctor_id)
    {

        // dd($id = $doctor_id);
        // Step 1: Retrieve the doctor with their time slots (for future dates)
        $user = User::with(['timeSlots' => function ($query) {
            $query->where('date', '>=', now());
        }])->where('id', $doctor_id)->whereIn('role', ['user', 'institute'])->first();
    
        if (!$user) {
            // Doctor not found, handle the error
            return redirect()->back()->with('error', 'Doctor not found.');
        }
    
        // Step 2: Retrieve the average rating and review count for the doctor
        $ratingData = Review::where('user_id', $doctor_id)
            ->select(DB::raw('AVG(rating) as average_rating'), DB::raw('COUNT(*) as review_count'))
            ->first();
    
        // Add average rating and review count to the doctor object
        $user->average_rating = (float) ($ratingData->average_rating ?? 0);
        $user->review_count = $ratingData->review_count ?? 0;
    
        // Step 3: Retrieve the doctor's specialties and associated institute, if any
        $specialtyName = null;
        if (!empty($user->specialties)) {
            $specialty = Specialty::find($user->specialties); // Assuming specialties are stored as a single ID or a list
            if ($specialty) {
                $specialtyName = $specialty->name;
            }
        }
    
        $instituteName = null;
        if (!empty($user->host_id)) {
            $institute = User::find($user->host_id);
            if ($institute) {
                $instituteName = $institute->first_name . ' ' . $institute->last_name;
            }
        }
    
        // Step 4: Prepare other related data
        $specialties = Specialty::all();
        $locations = City::whereIn('id', User::pluck('city'))->get();
        $networks = DoctorNetwork::all();
        $sliders = Slider::where('category', 'home')->latest()->take(5)->get();

    
        // Step 5: Return the view with the doctor data and related content
        return view('patient.member-availability', compact(
            'user',
            'specialties',
            'locations',
            'sliders',
            'networks',
            'specialtyName',
            'instituteName'
        ));
    }
    
    public function healthTips(){

        return view('patient.health-tips');
    }

    // Patients details API
    public function getPatients()
    {
        $onlineUsers = Patient::all();
    
        $data = $onlineUsers->map(function($patient) {
            return [
                'first_name' => $patient->first_name,
                'extension_code' => $patient->extension_code
            ];
        });
    
        return response()->json([
            'status' => 'success',
            'data' => $data
        ], 200);
    }
}
