<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Booking;
use App\Models\TimeSlot;
use App\Models\User;
use App\Models\WebImage;
use App\Models\Admin;
use App\Models\WebContent;
use App\Models\Slider;
use App\Models\MemberGroup;
use App\Models\Specialty;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;



class AppointmentController extends Controller
{

    public function storeUserIdInSession(Request $request)
    {
    
        $slotId = $request->input('slot_id');
        $userId = $request->input('user_id'); 
        $serviceType = $request->input('service_type', 'onsite'); // Default to 'onsite' if not provided
    
        $appointmentData = [
            'slot_id' => $slotId,
            'user_id' => $userId,
            'service_type' => $serviceType,
        ];

        session()->put('appointment_data', $appointmentData);
    }
    
    public function store(Request $request)
    {
        $appointmentData = session()->get('appointment_data');
       
        // Validate incoming request data
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'email' => 'required|string|email',
            'phone_number' => 'required|string',
            'date_of_birth' => 'required|date',
            'gender' => 'required|string',
            'additional_info' => 'required|string',
            'specialty_institute_id' => 'sometimes|required|exists:specialties,id',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $users =User::findOrFail($appointmentData['user_id']);
        if ($users->role == 'institute') {
            // If the user is an institute, get the specialty_institute_id from the form
            $specialty = $request->input('specialty_institute_id');
        } else {
            // Use the specialty for non-institute users
            $specialty = explode(',', $users->specialties)[0];
        }
        $timeslots = TimeSlot::findOrFail($appointmentData['slot_id']);
        $bookingDate = Carbon::parse($timeslots->date)->format('y-m-d');
        $fromTime = Carbon::parse($timeslots->date . ' ' . $timeslots->from_time)->format('Y-m-d H:i:s');
        $toTime = Carbon::parse($timeslots->date . ' ' . $timeslots->to_time)->format('Y-m-d H:i:s');

        $userId = $appointmentData['user_id'];
        $doctor = User::find($userId); 
        if (!$doctor) {
            throw new \Exception("Doctor with id $userId not found.");
        }
        $currentDateTime = Carbon::now();
        $minimumAllowedTime = $currentDateTime->addHour();
    
        if (Carbon::parse($fromTime)->lt($minimumAllowedTime)) {
            return redirect()->back()->with('success', 'Sorry, you cannot select a previous date and time. The appointment time must be at least one hour in the future.');
        }
        if (session()->has('patient_id')) {
             $bokkings =new Booking(); 
            $bokkings->user_id =$appointmentData['user_id'];
            $bokkings->pt_id =session('patient_id');
            $bokkings->from_time = $fromTime;
            $bokkings->to_time =$toTime;
            $bokkings->booking_date =$bookingDate ;
            $bokkings->patient_category =$specialty ;
            $bokkings->reason =$request->input('additional_info');
            $bokkings->fees = 200;	
            $bokkings->payment_method = $appointmentData['service_type'];
            $bokkings->save();
            $timeslots->duration =1;
            $timeslots->save();
            $email = $doctor->email;
            $subject = 'New Appointment Booking from' . $request->input('first_name');
            $data = [
                'doctor_name' => $doctor->first_name,
                'patient_name' => $request->input('first_name'),
                'patient_email' => $request->input('email'),
                'bookingDate' => $bookingDate,
                'fromTime' => $fromTime,

                'url' => 'https://doctors.allomed.ch/login',
            ];

            Mail::send('emails.email-booking-template', $data, function ($message) use ($email, $subject) {
                $message->to($email)
                        ->subject($subject);
            });
            return redirect()->back()->with('success', 'Your appointment application was sent successfully.');
        } 
        else {
            $otp = Str::random(6);
            Session::put('patient_form_data', $request->all());
            Session::put('patient_otp', $otp);
            $heroWebImage = WebImage::where('page', 'about')->first();
            $pageContent = WebContent::first();
            $sliders = Slider::latest()->take(5)->get();

            $admin = Admin::where('email', $request->input('email'))->first();
    
            if ($admin) {
                
                return redirect()->back()->with('success', 'User with this email already exists please login to book an appointment');
            }
            $email = $request->input('email');
            $name = $request->input('first_name');
            $subject = 'Verification Code';
            $data = ['otp' => $otp,
                    'name'=>$name

                    ];

            // Send OTP to user's email
            Mail::send('emails.booking-otp', $data, function ($message) use ($email, $subject) {
                $message->to($email)
                        ->subject($subject);
            });
            return redirect()->route('patientsOtp');
            // return view('home.otp',compact('heroWebImage','pageContent','sliders'));
        }
       
       
    }
    
    public function verifyOtp(Request $request){
        $request->validate([
            'otp' => 'required|string|max:6',
        ]);
        $storedOtp = Session::get('patient_otp');
        $appointmentData = session()->get('appointment_data');
        $formData = Session::get('patient_form_data');
        if ($request->otp === $storedOtp) {
            $patiaents =new Patient();
            $patiaents->first_name =$formData['first_name'];
            $patiaents->email =$formData['email'];
            $patiaents->phone  =$formData['phone_number'];
            $patiaents->birth_date =$formData['date_of_birth'];
            $patiaents->gender =$formData['gender'];
            $patiaents->save();
            $patientId = $patiaents->id;

            $defaultpassword = 741852741;
            $adminData = [
                'user_id' =>$patientId,
                'email' => $formData['email'],
                'password' => Hash::make($defaultpassword), 
                'role' => 'patient',
                'is_verified' => 1
            ];
        
            Admin::create($adminData);
            $users =User::findOrFail($appointmentData['user_id']);
            $specialty = explode(',', $users->specialties)[0];
            $timeslots = TimeSlot::findOrFail($appointmentData['slot_id']);
            $bookingDate = Carbon::parse($timeslots->date)->format('y-m-d');
            $fromTime = Carbon::parse($timeslots->date . ' ' . $timeslots->from_time)->format('Y-m-d H:i:s');
            $toTime = Carbon::parse($timeslots->date . ' ' . $timeslots->to_time)->format('Y-m-d H:i:s');

            $bokkings =new Booking(); 
            $bokkings->user_id =$appointmentData['user_id'];
            $bokkings->pt_id =$patientId;
            $bokkings->from_time = $fromTime;
            $bokkings->to_time =$toTime;
            $bokkings->booking_date =$bookingDate ;
            $bokkings->patient_category =$specialty ;
            $bokkings->reason =$formData['additional_info'];
            $bokkings->fees = 200;	
            $bokkings->payment_method = 'online';
            $bokkings->save();
                $timeslots->duration =1;
                $timeslots->save();

                $userId = $appointmentData['user_id'];
                $doctor = User::find($userId); 
                if (!$doctor) {
                    throw new \Exception("Doctor with id $userId not found.");
                }

            $email = $doctor->email;
            $subject = 'New Appointment Booking from' . $formData['first_name'];
            $data = [
                'doctor_name' => $doctor->first_name,
                'patient_name' => $formData['first_name'],
                'patient_email' => $formData['email'],
                'bookingDate' => $bookingDate,
                'fromTime' => $fromTime,

                'url' => 'https://doctors.allomed.ch/login',
            ];

            Mail::send('emails.email-booking-template', $data, function ($message) use ($email, $subject) {
                $message->to($email)
                        ->subject($subject);
            });

            $patientEmail = $formData['email'];
            $name = $formData['first_name'];
            $subject = 'Verification Code';
            $data = [
                    'name'=>$name,
                    'username' =>  $formData['email'],
                    'password' =>  $defaultpassword,
                    ];

            // Send OTP to patients email
            Mail::send('emails.patients-logindetails', $data, function ($message) use ($patientEmail, $subject) {
                $message->to($patientEmail)
                        ->subject($subject);
            });
            
            // dd($formData[ $patientId]);
            return redirect()->route('patientBooking')->with('success', 'Your appointment application was sent successfully. Please check your email for your login information.');
            
        }else{
            return redirect()->route('patientsOtp')->with('error', 'Invalid OTP. Please try again.');
        }
    }

// public function patientBooking(){
//     $appointmentData = session()->get('appointment_data');
//     $userId = $appointmentData['user_id'];
//     $user = User::where('id',$userId)->first();
//     $heroWebImage = WebImage::where('page', 'about')->first();
//     $pageContent = WebContent::first();
//     $sliders = Slider::latest()->take(5)->get();
//     return view('home.patient-booking',compact('user','heroWebImage','pageContent','sliders'));
// }
public function patientBooking() {
    $appointmentData = session()->get('appointment_data');
    $userId = $appointmentData['user_id'];
    $user = User::where('id', $userId)->first();
    $heroWebImage = WebImage::where('page', 'about')->first();
    $pageContent = WebContent::first();
    $sliders = Slider::latest()->take(5)->get();

    $specialties = [];

    if ($user->role == 'institute') {
        // Find all members associated with this institute using the `hosted_id`
        $members = MemberGroup::where('host_id', $user->id)->pluck('user_id');

        // Fetch the specialties of these members from the `users` table
        $specialtyIds = User::whereIn('id', $members)
            ->pluck('specialties') // Get specialties as a collection (IDs)
            ->flatMap(function($specialtyIds) {
                return explode(',', $specialtyIds); // Split comma-separated specialties
            })
            ->unique() // Ensure no duplicate specialties
            ->toArray(); // Convert to array

        // Fetch the specialty IDs and names from the `specialties` table
        $specialties = Specialty::whereIn('id', $specialtyIds)
            ->select('id', 'name') // Get both the id and the name
            ->get(); // Retrieve the result as a collection of objects
    }

    return view('home.patient-booking', compact('user', 'heroWebImage', 'pageContent', 'sliders', 'specialties'));
}


public function patientsOtp() {

    $heroWebImage = WebImage::where('page', 'about')->first();
    $pageContent = WebContent::first();
    $sliders = Slider::latest()->take(5)->get();
    return view('home.otp',compact('heroWebImage','pageContent','sliders'));

   }


}
