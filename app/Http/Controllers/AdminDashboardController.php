<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Plan;
use App\Models\Slider;
use App\Models\BannerImage;
use App\Models\Translation;
use App\Models\FaqQuestion;
use App\Models\Admin;
use League\Csv\Reader;
use League\Csv\Statement; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use App\Mail\OtpMail;
use DateTime;
use Exception;
class AdminDashboardController extends Controller
{
    public function index (){
        $admin = auth()->user();
        $user = $admin->user;
        return view('/admin/dashboard', compact('user'));
    }

    public function AdminPlans (){
        $admin = auth()->user();
        $user = $admin->user;
        $plans = Plan::all();
        return view('/admin/plans', compact('user', 'plans'));
    }
    public function addPlans (){
        $admin = auth()->user();
        $user = $admin->user;
        $plans = Plan::all();
        return view('/admin/add-plans', compact('user', 'plans'));
    }
    public function addSub (Request $request){
        $admin = auth()->user();
        $user = $admin->user;
        
        $request->validate([
            'name'=>'string|required',
            'feature'=>'string|required',
            'duration'=>'string|required',
            'amount'=>'string|required',
            
            'details'=>'string|required',
        ]);

        $plans = new Plan();
        $plans->name =  $request->input('name');
        $plans->duration =  $request->input('duration');
        $plans->amount =  $request->input('amount');
        $plans->details =  $request->input('details');
        $plans->ads_times =  0;
        $plans->feature =  $request->input('feature');
        

        $plans->save();

        return view('/admin/add-plans', compact('user', 'plans'));
    }
    public function sliders()
    {
        $admin = auth()->user();
        $user = $admin->user;
    
        // Fetch the last 5 sliders for each category
        $slidersByCategory = Slider::orderBy('created_at', 'desc')
                                    ->get()
                                    ->groupBy('category')
                                    ->map(function ($group) {
                                        return $group->take(5);
                                    });
    
        return view('admin.sliders', compact('user', 'slidersByCategory'));
    }
    
    

    public function deleteSlider($id)
    {
        try {
            $slider = Slider::findOrFail($id); 
            $slider->delete(); 
    
            return redirect()->route('sliders')->with('success', 'Slider image deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('sliders')->with('error', 'Failed to delete slider image.');
        }
    }
    public function addBanner(Request $request)
    {
        $admin = auth()->user();
        $user = $admin->user;
        
        $request->validate([
            'banner_name' => 'string|required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'string|required',
        ]);

        $sliders = new Slider();

        $sliders->banner_name = $request->input('banner_name');
        $sliders->category = $request->input('category');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move('images/apps', $imageName);
        
            $sliders->image = $imageName;
        }

        $sliders->save();

        return redirect()->back()->with('success', 'Slider image added successfully.');
    }

public function banners (){
    $admin = auth()->user();
    $user = $admin->user;

    $positions = ['loginLeft','top', 'sideTop', 'sideBottom', 'bottom','bottom2','bottom3','ptrTop','ptrBottom','ptrBottom2','ptrBottom3','proLeft',
    'ptrLeft','companyBottom', 'companyBottom2', 'companyBottom3', 'companyLeft'];
    $latestBanners = [];

    foreach ($positions as $position) {
        $latestBanners[$position] = BannerImage::where('image_postion', $position)
                                               ->orderBy('created_at', 'desc')
                                               ->first();
    }

    return view('/admin/banners', compact('user','latestBanners'));
}

public function addSiteBanners(Request $request)
{
    $admin = auth()->user();
    $user = $admin->user;
    
    $request->validate([
        'image_postion' => 'string|required',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'site_url' => 'nullable|required',
    ]);

    $banners = new BannerImage();

    $banners->image_postion = $request->input('image_postion');
    $banners->site_url = $request->input('site_url');

    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $imageName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move('images/apps', $imageName);
       
        $banners->image = $imageName;
    }
    $banners->status = 1;
    $banners->save();
    

    return back()->with('success', 'Banner added successfully!');
}
 
public function faqsAdmin()
{
    $admin = auth()->user();
    $user = $admin->user;
    $faqQuestions = FaqQuestion ::all();
    return view('admin/faq', compact('user', 'faqQuestions'));
}
public function faqStore(Request $request)
{
    $request->validate([
        'question' => 'string|required',
    ]);
    $faqQuestions = new FaqQuestion();
    $faqQuestions->question =$request->input('question');
    $faqQuestions->save();
    return redirect()->back()->with('success', 'Questions added successfully.');
}
public function faqUpdate(Request $request, $id)
    {
        $request->validate([
            'question' => 'required|string|max:255'
        ]);

        $faq = FaqQuestion::findOrFail($id);
        $faq->question = $request->question;
        $faq->save();

        return redirect()->back()->with('success', 'Questions added successfully.');
    }

    public function faqDestroy($id)
    {
        $question = FaqQuestion::findOrFail($id);
        $question->delete();

        return redirect()->back()->with('success', 'Questions Deleted successfully.');
    }
    public function editPlan($id)
{
    $admin = auth()->user();
    $user = $admin->user;
    $plan = Plan::findOrFail($id);
    
    return view('admin/edit-plan', compact('user', 'plan'));
}
public function updatePlans(Request $request)
{

    $request->validate([ 
        'plan_id' => 'required|string',
        'name' => 'required|string',
        'duration' => 'required|string',
        'amount' => 'required|string',
        'ads_times' => 'required|string',
        'details' => 'required|string',
    ]);
    $id = $request->input('plan_id');
    $plan = Plan::findOrFail($id);
    // Update the plan with the new data
    $plan->update([
        'name' => $request->input('name'),
        'duration' => $request->input('duration'),
        'amount' => $request->input('amount'),
        'ads_times' => $request->input('ads_times'),
        'details' => $request->input('details'),
    ]);
    
    return redirect()->route('editPlan', $id)->with('success', 'Plan updated successfully');

}
public function removePlan($id)
{
    // Find the plan by its ID
    $plan = Plan::findOrFail($id);
    
    // Delete the plan
    $plan->delete();
    
    return redirect()->route('plans')->with('success', 'Plan removed successfully');
}

public function trnaslationView(){
    $admin = auth()->user();
    $user = $admin->user;
    $trans = Translation::all();
    return view('/admin/translations', compact('user', 'trans'));
}
public function addTranslation (){
    $admin = auth()->user();
    $user = $admin->user;

    return view('/admin/add-translation', compact('user'));
}
public function saveTranslations(Request $request){
    $admin = auth()->user();
    $user = $admin->user;

    $key_text = $request->input('key_text');
        $translations = [];

        for ($i = 0; $i < count($request->input('translate')); $i++) {
            $translations[] = [
                'key_text' => $key_text,
                'translate' => $request->input('translate')[$i],
                'lang' => $request->input('lang')[$i],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        Translation::insert($translations);

        return redirect()->back()->with('success', 'Translations saved successfully.');
}

    public function showUploadForm()

    {
        $admin = auth()->user();
        $user = $admin->user;
        return view('admin.upload', compact('user'));
    }

public function createManualAccount(Request $request)
{

    $request->validate([
        'first_name' => 'required|string',
        'last_name' => 'required|string',
        'email' => 'required|string|email|unique:users,email',
    ]);

    $userData = [
        'first_name' => $request->input('first_name'),
        'last_name' => $request->input('last_name'),
        'email' => $request->input('email'),
        'role' => 'user',
        'otp'   => 123456
    ];

    $user = User::create($userData);
    $defaultpassword = 741852741;
    $adminData = [
        'user_id' => $user->id,
        'email' => $user->email,
        'password' => Hash::make($defaultpassword), 
        'role' => 'user',
        'is_verified' => 1
    ];

    Admin::create($adminData);

    $email = $request->input('email');
        $subject = 'Welcome to Allomed Doctor Directory - Registration Successful';
        $data = [
            'first_name' => $request->input('first_name'),
            'login_url' => 'https://doctors.allomed.ch/login',
            'email' => $email,
            'default_password' => $defaultpassword,
            'contact_information' => 'allomedirectory@gmail.com',
            'website' => 'https://doctors.allomed.ch',
        ];

        Mail::send('emails.otp', $data, function ($message) use ($email, $subject) {
            $message->to($email)->subject($subject);
        });

    return redirect()->back()->with('success', 'Account created successfully.');
}

// public function uploadCsv(Request $request)
// {
//     // Validate the uploaded file
//     $validator = Validator::make($request->all(), [
//         'csv_file' => 'required|mimes:csv,txt',
//     ]);

//     if ($validator->fails()) {
//         return redirect()->back()->withErrors($validator)->withInput();
//     }

//     // Handle the uploaded file
//     if ($request->hasFile('csv_file')) {
//         $file = $request->file('csv_file');
//         $path = $file->getRealPath();

//         // Read the CSV file with proper encoding handling
//         $data = [];
//         $handle = fopen($path, 'r');
//         if ($handle !== false) {
//             $header = null;
//             while (($row = fgetcsv($handle, 1000, ',')) !== false) {
//                 if (!$header) {
//                     $header = $row;
//                 } else {
//                     // Convert each row to UTF-8 encoding
//                     $row = array_map(function ($value) {
//                         return utf8_encode($value);
//                     }, $row);
//                     $data[] = $row;
//                 }
//             }
//             fclose($handle);
//         }

//         // Ensure the headers match the database columns
//         $tableColumns = Schema::getColumnListing('users');
//         $allowedColumns = array_intersect($header, $tableColumns);

//         foreach ($data as $row) {
//             // Skip rows that don't have the same number of elements as the header
//             if (count($header) !== count($row)) {
//                 continue;
//             }

//             // Combine header and row to get associative array
//             $rowData = array_combine($header, $row);

//             // Filter out any data that does not match the allowed columns
//             $filteredRowData = array_intersect_key($rowData, array_flip($allowedColumns));

//             // Convert date fields from d/m/Y to Y-m-d format
//             $dateFields = ['age']; // Add other date fields as needed
//             foreach ($dateFields as $dateField) {
//                 if (isset($filteredRowData[$dateField]) && !empty($filteredRowData[$dateField])) {
//                     try {
//                         $date = DateTime::createFromFormat('d/m/Y', $filteredRowData[$dateField]);
//                         if ($date) {
//                             $filteredRowData[$dateField] = $date->format('Y-m-d');
//                         } else {
//                             $filteredRowData[$dateField] = null; // or handle as needed
//                         }
//                     } catch (Exception $e) {
//                         $filteredRowData[$dateField] = null; // or handle as needed
//                     }
//                 }
//             }

         
//             // Handle nullable fields
//             $nullableFields = ['sxpertise'];
//             foreach ($nullableFields as $nullableField) {
//                 if (isset($filteredRowData[$nullableField]) && empty($filteredRowData[$nullableField])) {
//                     $filteredRowData[$nullableField] = null;
//                 }
//             }

//             if (isset($filteredRowData['age']) && (empty($filteredRowData['age']) || $filteredRowData['age'] == 'NULL')) {
//                 $filteredRowData['age'] = null;
//             }

//             if (isset($filteredRowData['created_at']) && $filteredRowData['created_at'] == '0000-00-00 00:00:00') {
//                 $filteredRowData['created_at'] = now();
//             }

//             if (isset($filteredRowData['updated_at']) && $filteredRowData['updated_at'] == '0000-00-00 00:00:00') {
//                 $filteredRowData['updated_at'] = now();
//             }

//             $defaultValues = [
//                 'role' => 'user',
//                 'service_type' => 'onsite',
//                 'otp' => '1',
//                 'is_active' => '0',
//                 'token' => '0', 
//                 'status' => '0',
//                 'patient_status' => '0',
//             ];

//             foreach ($defaultValues as $key => $value) {
//                 if (!isset($filteredRowData[$key]) || empty($filteredRowData[$key])) {
//                     $filteredRowData[$key] = $value;
//                 }
//             }

//             // Log the data for debugging
//             Log::info('Processing row data:', $filteredRowData);

//             try {
//                 // Create a new user record
//                 User::create($filteredRowData);
//             } catch (\Exception $e) {
//                 Log::error('Error processing row:', [
//                     'row' => $filteredRowData,
//                     'error' => $e->getMessage(),
//                     'trace' => $e->getTraceAsString(),
//                 ]);
//             }
//         }

//         return redirect()->back()->with('success', 'CSV file uploaded and processed successfully.');
//     }

//     return redirect()->back()->with('error', 'No file uploaded.');
// }


public function uploadCsv(Request $request)
{
    // Validate the uploaded file
    $request->validate([
        'csv_file' => 'required|mimes:csv,txt|max:2048',
    ]);

    // Open the file
    if (($handle = fopen($request->file('csv_file'), 'r')) !== false) {
        // Get the headers from the file
        $header = fgetcsv($handle, 1000, ',');

        // Log the header for debugging
        \Log::info('CSV Header: ', $header);

        // Iterate through the rest of the file rows
        while (($data = fgetcsv($handle, 1000, ',')) !== false) {
            // Log the data for debugging
            \Log::info('CSV Data Row: ', $data);

            // Check if the number of headers matches the number of data columns
            if (count($header) === count($data)) {
                // Map the CSV data to your table structure
                $userData = array_combine($header, $data);
                $allowedServiceTypes = ['onsite', 'remote', 'both'];
                $serviceType = $userData['service_type'] ?? 'onsite'; // Default to onsite if not provided
                $serviceType = in_array($serviceType, $allowedServiceTypes) ? $serviceType : 'onsite';

                // Check if 'first_name' is present and not empty
                if (!empty($userData['first_name'])) {
                    // Handle boost_end_at to ensure it is either a valid datetime or null
                    $boostEndAt = !empty($userData['boost_end_at']) ? $userData['boost_end_at'] : null;

                    // Validate if the datetime format is correct (optional)
                    if ($boostEndAt && !strtotime($boostEndAt)) {
                        \Log::warning('Invalid boost_end_at datetime format: ', ['value' => $boostEndAt]);
                        $boostEndAt = null; // Set to null if invalid
                    }

                    // Handle is_boosted to ensure it's an integer (0 or 1)
                    $isBoosted = !empty($userData['is_boosted']) && in_array($userData['is_boosted'], ['0', '1']) ? (int)$userData['is_boosted'] : 0;

                    // Create user only if first_name is not empty
                    User::create([
                        'first_name' => $userData['first_name'], // mandatory
                        'last_name' => $userData['last_name'] ?? null,
                        'email' => $userData['email'] ?? null,
                        'role' => $userData['role'] ?? 'user', // default role
                        'gender' => $userData['gender'] ?? null,
                        'age' => !empty($userData['age']) ? $userData['age'] : null, // Handle empty age
                        'country' => !empty($userData['country']) ? (int)$userData['country'] : null, // Handle empty country
                        'city' => !empty($userData['city']) ? (int)$userData['city'] : null,
                        'language' => $userData['language'] ?? null,
                        'profile_pic' => $userData['profile_pic'] ?? null,
                        'phone' => $userData['phone'] ?? null,
                        'zip_code' => $userData['zip_code'] ?? null,
                        'postal_code' => $userData['postal_code'] ?? null,
                        'Speaking_Languages' => $userData['Speaking_Languages'] ?? null,
                        'address' => $userData['address'] ?? null,
                        'fees' => $userData['fees'] ?? null,
                        'service_type' => $serviceType, // default service type
                        'speciality' => $userData['speciality'] ?? null,
                        'specialties' => !empty($userData['specialties']) ? (int)$userData['specialties'] : null,
                        'sxpertise' => $userData['sxpertise'] ?? null,
                        'Access_info' => $userData['Access_info'] ?? null,
                        'healthcare_professional_info' => $userData['healthcare_professional_info'] ?? null,
                        'about_me' => $userData['about_me'] ?? null,
                        'payment_method' => $userData['payment_method'] ?? null,
                        'latitude' => $userData['latitude'] ?? null,
                        'longitude' => $userData['longitude'] ?? null,
                        'otp' => $userData['otp'] ?? null,
                        'is_online' => $userData['is_online'] ?? 1,
                        'is_active' => $userData['is_active'] ?? 0,
                        'token' => $userData['token'] ?? 0,
                        'status' => $userData['status'] ?? 0,
                        'title' => $userData['title'] ?? null,
                        'house_number' => $userData['house_number'] ?? null,
                        'hin_email' => $userData['hin_email'] ?? null,
                        'fax_phone_number' => $userData['fax_phone_number'] ?? null,
                        'fax_number' => $userData['fax_number'] ?? null,
                        'reviwes' => $userData['reviwes'] ?? null,
                        'patient_status' => $userData['patient_status'] ?? null,
                        'boost_end_at' => $boostEndAt, // Use validated boost_end_at
                        'is_boosted' => $isBoosted, // Use validated is_boosted
                        'web_url' => $userData['web_url'] ?? null,
                        'institute_id' => !empty($userData['institute_id']) ? (int)$userData['institute_id'] : null,
                        
                        'zefix_id' => $userData['zefix_id'] ?? null,
                    ]);
                } else {
                    \Log::warning('Skipped row due to missing first_name: ', $userData);
                }
            } else {
                \Log::warning('Header and data length mismatch. Header: ' . implode(',', $header) . ' | Data: ' . implode(',', $data));
            }
        }
        fclose($handle);
    }

    return redirect()->back()->with('success', 'CSV uploaded successfully.');
}


}
