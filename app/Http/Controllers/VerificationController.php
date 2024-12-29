<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Models\Slider;
use App\Models\Patient;
use App\Models\Booking;
use App\Models\Review;
use App\Models\Verification;
use App\Models\DoctorCertificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class VerificationController extends Controller
{
    public function showForm($id)
    {
        $admin = auth()->user();
        $user = $admin->user;
        $sliders = Slider::latest()->take(5)->get();
        $documents = Verification::where('user_id', $user->id)->latest()->first();

        // Check if the documents are verified
        if ($documents && $documents->verify_code == 'verified' || Session::get('access_key') == 'permitted') {
            return view('verifications', [
                'user' => $user,
                'plan_id' => $id,
                'sliders' => $sliders,
                'documents' => $documents
            ]);
        } else {
            // Generate and store OTP
            $otp = Str::random(6);
            Session::put('member_email_otp', $otp);

            // Send OTP to user's email
            $email = $user->email;
            $first_name = $user->first_name;
            $last_name = $user->last_name;
            $subject = 'Document Access Verification Code';
            $data = [
                'otp' => $otp,
                'first_name' => $first_name,
                'last_name' => $last_name,
            ];

            Mail::send('emails.documents_verification', $data, function ($message) use ($email, $subject) {
                $message->to($email)->subject($subject);
            });

            return redirect()->route('documentsOtp');

        }
    }

    public function verifyDocumentOtp(Request $request)
    {
        $admin = auth()->user();
        $user = $admin->user;
        $sliders = Slider::latest()->take(5)->get();
        $documents = Verification::where('user_id', $user->id)->latest()->first();

        // Validate the input OTP
        $request->validate([
            'otp' => 'required|string|max:6',
        ]);

        // Retrieve the stored OTP from the session
        $storedOtp = Session::get('member_email_otp');

        // Check if the provided OTP matches the stored OTP
        if ($request->input('otp') === $storedOtp) {

            Session::put('access_key', 'permitted');

            // Allow access to the verifications page
            return view('verifications', [
                'user' => $user,
                'sliders' => $sliders,
                'documents' => $documents
            ]);
        } else {
            // If OTP does not match, redirect back with an error message
            return redirect()->back()->withErrors(['otp' => 'Invalid OTP. Please try again.']);
        }
    }
    public function documnetsOtp()
    {
        $admin = auth()->user();
        $user = $admin->user;
        $sliders = Slider::latest()->take(5)->get();
        return view('document_verification_otp', [
            'user' => $user,
            'sliders' => $sliders,
        ]);
    }
    public function reviwes()
    {
        $admin = auth()->user();
        $user = $admin->user;
        $sliders = Slider::latest()->take(5)->get();
        $reviews = Review::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();

        // Pass any necessary data to the view
        return view('reviwes', [
            'user' => $user,
            'sliders' => $sliders,
            'reviews' => $reviews,
        ]);
    }

    public function submitReview(Request $request)
    {
        $request->validate([
            'patient_name' => 'required|string|max:255',
            'email' => 'required|email',
            'rating' => 'required|integer|between:1,5',
            'comments' => 'nullable|string',
            'user_id' => 'required|integer'
        ]);

        $patient = Patient::where('email', $request->email)->first();

        if (!$patient) {
            return back()->withErrors(['email' => 'You didn\'t book this doctor yet.']);
        }

        $booking = Booking::where('pt_id', $patient->id)
            ->where('user_id', $request->user_id)
            ->first();

        if (!$booking) {
            return back()->withErrors(['email' => 'You didn\'t book this doctor yet.']);
        }

        Review::create([
            'user_id' => $request->user_id,
            'patient_name' => $request->patient_name,
            'email' => $request->email,
            'rating' => $request->rating,
            'comments' => $request->comments,
        ]);

        return redirect()->back()->with('success', 'Review submitted successfully.');
    }

    public function sendDocumentOtp(Request $request)
    {
        $emailOtp = Str::random(6);
        Session::put('email_otp', $emailOtp);
        Session::put('patient_form_data', $request->all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'doctor_id_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'certificates.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $admin = auth()->user();
        $user = $admin->user;

        // Store verification data
        $verification = new Verification();
        $verification->user_id = $user->id;

        if ($request->hasFile('doctor_id_image')) {
            $file = $request->file('doctor_id_image');
            $imageName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/documents'), $imageName);
            $verification->doctor_id_image = $imageName;
        }

        $verification->save();

        // Store certificate data
        if ($request->hasFile('certificates')) {
            foreach ($request->file('certificates') as $file) {
                $imageName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('images/documents'), $imageName);

                $certificate = new DoctorCertificate();
                $certificate->documnet_id = $verification->id;
                $certificate->image = $imageName;
                $certificate->save();
            }
        }
        
        return redirect()->route('verification_form', ['id' => $user->id]);
        // return redirect()->back()->with('success', 'Verification request submitted successfully.');
    }

    public function verifyCode(Request $request)
    {
        $request->validate([
            'verify_code' => 'required|string',
        ]);
        $admin = auth()->user();
        $user = $admin->user;
        $verification = Verification::where('user_id', $user->id)
            ->where('verify_code', $request->verify_code)
            ->first();

        if ($verification) {
            $verification->update(['verify_code' => 'verified', 'details' =>  $request->verify_code]);

            return redirect()->back()->with('success', 'Verification successful.');
        } else {
            return redirect()->back()->with('error', 'Invalid verification code.');
        }
    }
    public function verificationRequestsAdmin()
    {
        $admin = auth()->user();
        $user = $admin->user;

        // Fetch verifications with user relationship
        $verifications = Verification::where('verify_code', Null)
            ->with('user')
            ->get();

        // Check if $verifications is not empty before passing to view
        if ($verifications->isEmpty()) {
            // Handle case where no verifications are found
            $verifications = []; // or null, depending on your preference
        }

        return view('admin.verification-requests', compact('verifications', 'user'));
    }

    public function deny($id)
    {
        $verification = Verification::find($id);
        if ($verification) {
            $verification->delete(); // or handle the denial logic as needed
            return redirect()->back()->with('success', 'Verification request denied successfully.');
        }
        return redirect()->back()->with('error', 'Verification request not found.');
    }
    public function show($id)
    {
        $admin = auth()->user();
        $user = $admin->user;

        // Fetch the verification with the related user
        $verification = Verification::with('user')->find($id);

        if (!$verification) {
            return redirect()->back()->with('error', 'Verification not found.');
        }

        // Fetch the related doctor certificates
        $doctorCertificates = DoctorCertificate::where('documnet_id', $verification->id)->get();

        return view('admin.verification-details', compact('verification', 'user', 'doctorCertificates'));
    }
    public function approve($id)
    {
        $verification = Verification::find($id);

        if (!$verification) {
            return redirect()->back()->with('error', 'Verification not found.');
        }

        // Generate 8-digit random code
        $randomCode = str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT);

        // Update verification with random code
        $verification->update(['verify_code' => 'verified',]);

        return redirect()->route('admin.approved.list')->with('success', 'Verification request approved with code: ' . $randomCode);
    }

    public function approvedList()
    {
        $admin = auth()->user();
        $user = $admin->user;

        // Fetch approved verifications with the related user
        $approvedVerifications = Verification::whereNotNull('verify_code')
            ->where('verify_code', '!=', '')
            ->with('user')
            ->get();

        return view('admin.admin-approved-list', compact('approvedVerifications', 'user'));
    }
}
