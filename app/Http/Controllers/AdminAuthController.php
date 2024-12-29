<?php

namespace App\Http\Controllers;

use PragmaRX\Google2FAQRCode\Google2FA;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use App\Models\Admin;
use App\Models\User;
use App\Models\WebContent;
use App\Models\WebImage;
use App\Models\Slider;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\OtpMail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\RateLimiter;
use SimpleSoftwareIO\QrCode\Facades\QrCode;



class AdminAuthController extends Controller
{
    public function showRegistrationForm(Request $request)
    {   
        $email = $request->query('email');
        $status = $request->query('status');

        $user = User::where('email', $email)->first();
        $emailNotFound = !$user;
        $countries = getCountries();
        $languages = getLanguages();
        $pageContent = WebContent::first();
        $homeWebImages = WebImage::where('page', 'login')->get();
        return view('/register', compact('user','status','emailNotFound','countries', 'languages','pageContent','homeWebImages'));
    }

    public function userRegister(Request $request)
{
    $request->validate([
        'first_name' => 'required|string',
        'last_name' => 'string|required',
        'phone' => 'required|string',
        'email' => 'required|string|email',
        'password' => 'required|string|min:8',
        'area_code' => 'required|string',
        'g-recaptcha-response' => 'required'
    ]);


    $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
        'secret' => config('services.recaptcha.secret_key'),  // Use config() to get the secret key
        'response' => $request->input('g-recaptcha-response'),
        'remoteip' => $request->ip(),
    ]);

    $recaptchaResult = $response->json();

    if (!$recaptchaResult['success']) {
        return back()->withInput()->withErrors(['captcha' => 'reCAPTCHA verification failed. Please try again.']);
    }
    // Check if a user with the same email exists in the Admin table
    $admin = Admin::where('email', $request->input('email'))->first();
    
    if ($admin) {
        return back()->withInput()->withErrors(['email' => 'User with this email already exists']);
    }

    // Check if a user with the same first name, last name, and area code exists in the Users table
    $existingUser = User::where('first_name', $request->input('first_name'))
    ->where('last_name', $request->input('last_name'))
    ->where('postal_code', $request->input('area_code'))
    ->first();

if ($existingUser) {
    return back()->withInput()->withErrors(['email' => 'User with these details already exists. Please contact support. info@doctomed.ch ']);
}

    // Proceed with creating or updating the user and admin records
    $userData = [
        'first_name' => $request->input('first_name'),
        'last_name' =>  $request->input('last_name'),
        'email' => $request->input('email'),
        'phone' => $request->input('phone'),
        'postal_code' => $request->input('area_code'),
        'otp' => 'registration successful',
        'is_active' => true,
    ];

    $user = User::updateOrCreate(
        ['email' => $userData['email']],
        $userData
    );

    $admin = Admin::updateOrCreate(
        ['email' => $userData['email']],
        [
            'user_id' => $user->id,
            'email' => $userData['email'],
            'password' => Hash::make($request->input('password')),
            'role' => 'user',
            'is_verified' => 1
        ]
    );

    $email = $request->input('email');
    $subject = 'Welcome to Allomed Doctor Directory - Registration Successful';
    $data = [
        'first_name' => $request->input('first_name'),
        'login_url' => 'https://doctors.allomed.ch/login',
        'email' => $email,
        'default_password' => $request->input('password'),
        'contact_information' => 'allomedirectory@gmail.com',
        'website' => 'https://doctors.allomed.ch',
    ];

    Mail::send('emails.otp', $data, function ($message) use ($email, $subject) {
        $message->to($email)->subject($subject);
    });

    return back()->with('success', 'Registration successful');
}

    public function otpVerification(Request $request){
        $user_id = session('user_id');
        $request->validate([
            'otp'=>'string|required',
        ]);
        $user = User::find($user_id);
        if(!$user){
            return back()->withErrors(['user_not_found' => 'User not found']);
        }
        if ($user->otp === $request->otp) {
            $user->is_active = true;
            $user->save();
            $admin = Admin::where('user_id', $user_id)->first();
        
            if ($admin) {
                $admin->is_verified = 1;
                $admin->save();
            }
            return redirect('/login');
        } else {
            return view('verify-otp')->with(['otp_mismatch' => 'Invalid OTP']);
        }
    }
    
    public function showLoginForm()
    {
        if (Auth::check()) {
            $role = Auth::user()->role;
    
            // Redirect based on the user role
            if ($role === 'user') {
                return redirect()->route('dashboard');
            }  elseif ($role === 'patient') {
                return redirect()->route('patient.dashboard');
            }
        }
    
        // Load login page content if the user is not authenticated
        $homeWebImages = WebImage::where('page', 'login')->get();
        $pageContent = WebContent::first();
        return view('/login', compact('pageContent', 'homeWebImages'));
    }
    
  
    public function login(Request $request)
    {
        // Check if the user is already authenticated
        if (Auth::check()) {
            $user = Auth::user();
    
            // Redirect the authenticated user to their respective dashboard
            return $this->redirectToDashboard($user);
        }
    
        // Validate credentials
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        // Attempt to log in
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
    
            // Check if the user is verified
            if ($user->is_verified == 1) {
                return $this->redirectToDashboard($user); // Redirect based on the user's role
            } else {
                Auth::logout();
                return back()->withInput()->withErrors(['email' => 'User is not verified']);
            }
        }
    
        // If credentials are invalid
        return back()->withInput()->withErrors(['email' => 'Invalid credentials']);
    }
    
    /**
     * Redirect the authenticated user to their appropriate dashboard based on their role.
     */
    protected function redirectToDashboard($user)
    {
        $role = $user->role;
    
        // Redirect based on the user's role
        if ($role === 'user') {
            return redirect()->route('dashboard');
        } elseif ($role === 'patient') {
            $patient = $user->patient;
            if ($patient) {
                session(['patient_id' => $patient->id]);
            }
            return redirect()->route('patient.dashboard');
        }
    
        // Default redirection if no role is matched
        return redirect()->route('login');
    }
    


        private function generateUniqueUsername($firstName) {
            $username = strtolower($firstName . '_' . Str::random(5)); // Example: first name followed by a random string of length 5
        
            while (User::where('username', $username)->exists()) {
                $username = strtolower($firstName . '_' . Str::random(5)); // Regenerate username if it already exists
            }
        
            return $username;
        }
        
        public function patientsRegister(Request $request)
        {   
     
            $countries = getCountries();
            $languages = getLanguages();
            $pageContent = WebContent::first();
            $homeWebImages = WebImage::where('page', 'login')->get();
            return view('/patient-register', compact('countries', 'languages','pageContent','homeWebImages'));
        }
        public function patientsRegistration(Request $request)
        {
            $otp = Str::random(6);
            Session::put('patient_form_data', $request->all());
            Session::put('patient_otp', $otp);
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
            return redirect()->route('patientsRegisterOtp');
          
        }
    
    public function patientOtpverify(Request $request){
        $request->validate([
            'otp' => 'required|string|max:6',
        ]);
        $storedOtp = Session::get('patient_otp');
        $formData = Session::get('patient_form_data');
        if ($request->otp === $storedOtp) {
            $patiaents =new Patient();
            $patiaents->first_name =$formData['first_name'];
            $patiaents->last_name =$formData['last_name'];
            $patiaents->email =$formData['email'];
            // $patiaents->country =$formData['country'];
            // $patiaents->language =$formData['language'];
            $patiaents->phone  =$formData['phone'];
            // $patiaents->gender =$formData['gender'];
            // $patiaents->birth_date =$formData['age'];
           
            $patiaents->save();
            $patientId = $patiaents->id;

            
            $adminData = [
                'user_id' =>$patientId,
                'email' => $formData['email'],
                'password' => Hash::make($formData['password']), 
                'role' => 'patient',
                'is_verified' => 1
            ];
        
            Admin::create($adminData);
            return redirect()->route('patientsRegister')->with('success', 'Your appointment application was sent successfully. Please check your email for your login information.');
        }else{
            return redirect()->route('patientsRegisterOtp')->with('error', 'Invalid OTP. Please try again.');
        }

    }
    public function patientsRegisterOtp() {

        $heroWebImage = WebImage::where('page', 'about')->first();
        $pageContent = WebContent::first();
        $sliders = Slider::latest()->take(5)->get();
        return view('/patients-otp',compact('heroWebImage','pageContent','sliders'));
    
       }
       


       public function companyRegistrationForm(Request $request)
        {   
     
            $countries = getCountries();
            $languages = getLanguages();
            $pageContent = WebContent::first();
            $homeWebImages = WebImage::where('page', 'login')->get();
            return view('/company-register', compact('countries', 'languages','pageContent','homeWebImages'));
        }

        public function companyRegister(Request $request){
            $request->validate([
                'first_name' => 'required|string',
                'city' => 'required',
                'phone' => 'required|string',
                'email' => 'required|string|email',
                'password' => 'required|string|min:8',
                'area_code' => 'required|string',
                'g-recaptcha-response' => 'required'
            ]);
            $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
                'secret' => config('services.recaptcha.secret_key'),  // Use config() to get the secret key
                'response' => $request->input('g-recaptcha-response'),
                'remoteip' => $request->ip(),
            ]);
        
            $recaptchaResult = $response->json();
        
            if (!$recaptchaResult['success']) {
                return back()->withInput()->withErrors(['captcha' => 'reCAPTCHA verification failed. Please try again.']);
            }
            // Check if a user with the same email exists in the Admin table
            $admin = Admin::where('email', $request->input('email'))->first();
            
            if ($admin) {
                return back()->withInput()->withErrors(['email' => 'User with this email already exists']);
            }
        
            // Check if a user with the same first name, last name, and area code exists in the Users table
            $existingUser = User::where('first_name', $request->input('first_name'))
            ->where('last_name', $request->input('last_name'))
            ->where('email', $request->input('last_name'))
            ->where('postal_code', $request->input('area_code'))
            ->first();
        
        if ($existingUser) {
            return back()->withInput()->withErrors(['email' => 'User with these details already exists. Please contact support. info@doctomed.ch ']);
        }
        
            // Proceed with creating or updating the user and admin records
            $userData = [
                'first_name' => $request->input('first_name'),
                'role' => $request->input('user', 'institute'),
                'city' =>  $request->input('city'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'postal_code' => $request->input('area_code'),
                'otp' => 'registration successful',
                'is_active' => true,
            ];
        
            $user = User::updateOrCreate(
                ['email' => $userData['email']],
                $userData
            );
        
            $admin = Admin::updateOrCreate(
                ['email' => $userData['email']],
                [
                    'user_id' => $user->id,
                    'email' => $userData['email'],
                    'password' => Hash::make($request->input('password')),
                    'role' => 'user',
                    'is_verified' => 1
                ]
            );
        
            $email = $request->input('email');
            $subject = 'Welcome to Allomed Doctor Directory - Registration Successful';
            $data = [
                'first_name' => $request->input('first_name'),
                'login_url' => 'https://doctors.allomed.ch/login',
                'email' => $email,
                'default_password' => $request->input('password'),
                'contact_information' => 'allomedirectory@gmail.com',
                'website' => 'https://doctors.allomed.ch',
            ];
        
            Mail::send('emails.otp', $data, function ($message) use ($email, $subject) {
                $message->to($email)->subject($subject);
            });
        
            return back()->with('success', 'Registration successful');
        }

        public function showAdminLoginForm()
        {
            if (Auth::check() && Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }
        
    
            // If no one is logged in, show the admin login page
            $homeWebImages = WebImage::where('page', 'login')->get();
            $pageContent = WebContent::first();
            return view('admin.login', compact('pageContent', 'homeWebImages'));
        }
    
        public function adminLoginCheck(Request $request)
        {
            // Validate credentials
            $credentials = $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);
        
            $throttleKey = strtolower($request->input('email')) . '|' . $request->ip();
            
            // Clear previous throttle records
            RateLimiter::clear($throttleKey); 
        
            // Attempt to authenticate user
            if (Auth::attempt($credentials)) {
                $user = Auth::user();
        
                // Check if the user is verified and is an admin
                if ($user->is_verified == 1 && $user->role === 'admin') {
                    $google2fa = app('pragmarx.google2fa');
        
                    // Check if the user already has a Google 2FA secret key
                    if (empty($user->google2fa_secret)) {
                        // Generate a new secret key if not present
                        $user->google2fa_secret = $google2fa->generateSecretKey();
                        $user->save();
                    }
        
                    // Generate the QR code image for 2FA setup
                    $qrImage = 'data:image/svg+xml;base64,' . base64_encode(
                        $google2fa->getQRCodeInline(
                            config('app.name'), 
                            $user->email, 
                            $user->google2fa_secret
                        )
                    );

                    $secret_code = $user->google2fa_secret;
        
                    // Redirect to the 2FA verification view with QR code and secret code
                    return view('admin.2fa_verify', compact('qrImage'));
                }
        
                // Logout the user if they are not verified or not an admin
                Auth::logout();
                return redirect()->route('showAdminLoginForm')
                    ->withErrors(['email' => 'Access denied.']);
            }
        
            // Invalid login attempt, throttle login attempts
            RateLimiter::clear($throttleKey);
        
            
            return back()->withInput()->withErrors(['email' => 'Invalid credentials']);
        }

        public function show2FAForm()
        {
            $user = Auth::user();

            // Check if the user has a 2FA secret key
            if (empty($user->google2fa_secret)) {
                // If not, redirect or handle it as necessary
                return redirect()->route('admin.dashboard')->withErrors(['2fa' => '2FA is not set up for this user.']);
            }
        
            // Instantiate Google 2FA
            $google2fa = app('pragmarx.google2fa');
        
            // Generate the QR Code
            $qrImage = 'data:image/svg+xml;base64,' . base64_encode(
                $google2fa->getQRCodeInline(
                    config('app.name'),
                    $user->email,
                    $user->google2fa_secret
                )
            );
        
            $secret_code = $user->google2fa_secret;
        
            
            return view('admin.2fa_verify', compact('qrImage', 'secret_code'));
        }
        
        public function verify2FA(Request $request)
        {
            $request->validate([
                'one_time_password' => 'required|digits:6',
            ]);
        
            $user = Auth::user();
            $google2fa = app('pragmarx.google2fa');
        
            $valid = $google2fa->verifyKey($user->google2fa_secret, $request->input('one_time_password'));
        
            if ($valid) {
                session(['2fa_verified' => true]); // Mark 2FA as verified
                return redirect()->route('admin.dashboard')->with('status', 'Successfully logged in.');
            }
        
            return redirect()->route('admin.2fa.verify')->withErrors(['one_time_password' => 'Invalid one-time password. Please try again.']);
        }
        

            public function logout()
            {
                Auth::logout();
                // session()->forget('2fa_verified');
                session()->forget('patient_id');
                session()->forget('access_key');
                return redirect()->route('login');
            }
}

