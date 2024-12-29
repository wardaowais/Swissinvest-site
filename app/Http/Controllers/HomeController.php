<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserCollection;
use Illuminate\Support\Collection;
use App\Models\User;
use App\Models\TimeSlot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use App\Models\Slider;
use App\Models\FaqQuestion;
use App\Models\FaqAnswer;
use App\Models\Specialty;
use App\Models\Expertise;
use App\Models\WebImage;
use App\Models\DoctorNetwork;
use App\Models\WebContent;
use App\Models\City;
use App\Models\Language;
use App\Models\Review;
use App\Models\MemberGroup;
use App\Models\Institute;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // Fetch specialties and locations if needed
        $specialties = Specialty::all();

        $locations = City::whereIn('id', User::pluck('city'))->get();
        $sliders = Slider::where('category', 'home')->latest()->take(5)->get();
        $homeWebImages = WebImage::where('page', 'home')->get();
        $pageContent = WebContent::first();
        return view('home.main-home', compact('specialties', 'locations', 'sliders', 'homeWebImages', 'pageContent'));
    }



    public function search(Request $request)
    {
        try {
            $specialtyId = Crypt::decrypt($request->input('specialty'));
            $city = Crypt::decrypt($request->input('city'));
          } catch (DecryptException $e) {
            // Handle decryption error (e.g., log the error)
            $specialtyId = $request->input('specialty');
            $city = $request->input('city');
          }
        $date = $request->input('date');
        $gender = $request->input('gender');
        $language = $request->input('language');
        $network = $request->input('network');
        $new_patients = $request->input('new_patients');
        $serviceType = $request->input('service_type');
        $instituteId = $request->input('institute') ? Crypt::decrypt($request->input('institute')) : null;

        $instituteName = null;
        if (!empty($instituteId)) {
            $institute = User::find($instituteId);
            if ($institute) {
                $instituteName = $institute->first_name . ' ' . $institute->last_name;
            }
        }

        $specialtyName = null;
        if (!empty($specialtyId)) {
            $specialty = Specialty::find($specialtyId);
            if ($specialty) {
                $specialtyName = $specialty->name;
            }
        }

        // Step 1: Retrieve users based on search criteria
        $usersQuery = User::with(['timeSlots' => function ($query) {
            $query->where('date', '>=', now());
        }]);
        if (!empty($instituteId)) {
            $usersQuery->where('role', 'guser')
            ->whereNotNull('first_name')
            ->whereNotNull('phone')
            ->whereNotNull('address')
            ->where(function ($query) {
                $query->where('first_name', '!=', '')
                      ->where('phone', '!=', '')
                      ->where('address', '!=', '');
            });
            
        } else {
            $usersQuery->whereIn('role', ['user', 'institute'])
            ->whereNotNull('first_name')
            ->whereNotNull('phone')
            ->whereNotNull('address')
            ->where(function ($query) {
                $query->where('first_name', '!=', '')
                      ->where('phone', '!=', '')
                      ->where('address', '!=', '');
            });

            $usersQuery->when(in_array('institute', ['user']), function ($query) {
                $query->whereNotNull('last_name')
                      ->where('last_name', '!=', ''); // Also ensure last_name is not empty
            });
        // Apply the last_name condition only for roles other than 'institute'

        }
       


        if (!empty($specialtyId) && $specialtyId !== "Select specialty") {
            $usersQuery->where(function ($query) use ($specialtyId) {
                // Check if the user's specialties directly match
                $query->whereRaw("FIND_IN_SET(?, specialties)", [$specialtyId])
                    // Or, check if the user's hosted groups have members with matching specialties
                    ->orWhereHas('hostedGroups', function ($query) use ($specialtyId) {
                        $query->whereHas('user', function ($query) use ($specialtyId) {
                            $query->whereRaw("FIND_IN_SET(?, specialties)", [$specialtyId]);
                        });
                    });
            });
        }

        if (!empty($city) && $city !== "Select Location") {
            // Step 1: Get the canton_id for the selected city
            $selectedCity = City::where('id', $city)->first();
            
            if ($selectedCity) {
                $cantonId = $selectedCity->canton_id;
        
                // Step 2: Find all cities with the same canton_id
                $relatedCities = City::where('canton_id', $cantonId)->pluck('id');
                
                // Step 3: Modify the query to prioritize users from the selected city first
                $usersQuery->where(function ($query) use ($city, $relatedCities) {
                    // Include users from the selected city and related cities
                    $query->where('city', $city)
                          ->orWhereIn('city', $relatedCities)
                          ->orWhereHas('hostedGroups', function ($query) use ($relatedCities) {
                              $query->whereHas('user', function ($query) use ($relatedCities) {
                                  $query->whereIn('city', $relatedCities);
                              });
                          });
                });
        
                // Step 4: Prioritize users from the selected city
                $usersQuery->orderByRaw("CASE WHEN city = ? THEN 0 ELSE 1 END", [$city]);
            }
        }
        
        

        if (!empty($language) && $language !== "Select Language") {
            $usersQuery->where('language', $language);
        }

        if (!empty($gender) && $gender !== "Select Gender") {
            $usersQuery->where('gender', $gender);
        }

        if (!empty($network) && $network !== "Select Network") {
            $usersQuery->where('Access_info', $network);
        }

        if (!empty($new_patients) && $new_patients !== "Select New Patients") {
            $usersQuery->where('is_online', $new_patients);
        }

        if (!empty($date)) {
            $usersQuery->whereHas('timeSlots', function ($query) use ($date) {
                $query->where('date', $date);
            });
        }

        if ($serviceType === 'remote') {
            $usersQuery->where('service_type', 'remote');
        }

        if (!empty($instituteId)) {
            $usersQuery->whereHas('memberGroups', function ($query) use ($instituteId) {
                $query->where('host_id', $instituteId);
            });
        }

        $usersQuery->orderBy('is_boosted', 'desc')
            ->orderBy('is_active', 'desc')
            ->orderBy('is_boosted', 'asc');

        $perPage = 10;
        $users = $usersQuery->paginate($perPage);

        // Step 2: Retrieve average rating for each user
        $userIds = $users->pluck('id');
        $ratings = Review::whereIn('user_id', $userIds)
            ->select('user_id', DB::raw('AVG(rating) as average_rating'), DB::raw('COUNT(*) as review_count'))
            ->groupBy('user_id')
            ->get()
            ->keyBy('user_id');

        $users->each(function ($user) use ($ratings) {
            $user->average_rating = (float) ($ratings[$user->id]->average_rating ?? 0);
            $user->review_count = $ratings[$user->id]->review_count ?? 0;
        });


        Session::put('search_results', $users->items());
        $users->appends([
            'specialty' => $specialtyId,
            'city' => $city,
            'date' => $date,
        ]);

        $totalDoctors = $users->total();
        $noDoctorsFound = $totalDoctors === 0;
        $specialties = Specialty::all();
        $locations = City::whereIn('id', User::pluck('city'))->get();
        $networks = DoctorNetwork::all();
        $sliders = Slider::where('category', 'home')->latest()->take(5)->get();
        $heroWebImage = WebImage::where('page', 'search')->first();
        $pageContent = WebContent::first();

        return view('home.home', compact('users', 'specialties', 'locations', 'sliders', 'totalDoctors', 'noDoctorsFound', 'heroWebImage', 'pageContent', 'networks', 'instituteName', 'specialtyName'));
    }




    public function aboutDoctor($encrypted_id, $date = null)
    {
        try {
            $userId = decrypt($encrypted_id);
            $user = User::findOrFail($userId);

            $specialtyIds = explode(',', $user->specialties);
            $specialties = Specialty::whereIn('id', $specialtyIds)->get();

            $expertiseIds = explode(',', $user->sxpertise);
            $expertises = Expertise::whereIn('id', $expertiseIds)->get();

            $timeSlots = TimeSlot::where('user_id', $userId)
                ->whereDate('date', '>=', now()->toDateString())
                ->orderBy('date', 'asc')
                ->get();

            $uniqueDates = $timeSlots->pluck('date')->unique()->map(function ($date) {
                return \Carbon\Carbon::parse($date);
            });

            $currentDate = $date ? \Carbon\Carbon::parse($date) : $uniqueDates->first();
            $currentIndex = $uniqueDates->search($currentDate);
            $prevDate = $currentIndex > 0 ? $uniqueDates->get($currentIndex - 1) : null;
            $nextDate = $currentIndex < $uniqueDates->count() - 1 ? $uniqueDates->get($currentIndex + 1) : null;

            $sliders = Slider::where('category', 'home')->latest()->take(5)->get();

            $faqQuestions = FaqQuestion::with(['answers' => function ($query) use ($userId) {
                $query->where('user_id', $userId);
            }])->get();
            $heroWebImage = WebImage::where('page', 'about')->first();
            $pageContent = WebContent::first();
            return view('home.about-doctor', [
                'user' => $user,
                'specialties' => $specialties,
                'expertises' => $expertises,
                'timeSlots' => $timeSlots,
                'sliders' => $sliders,
                'faqQuestions' => $faqQuestions,
                'uniqueDates' => $uniqueDates,
                'currentDate' => $currentDate,
                'prevDate' => $prevDate,
                'nextDate' => $nextDate,
                'heroWebImage' => $heroWebImage,
                'pageContent' => $pageContent,
            ]);
        } catch (DecryptException $e) {
            return redirect()->route('home.home')->withErrors('Invalid user profile link.');
        }
    }

    public function aboutDoctorMap($encrypted_id, $date = null)
    {
        try {
            $userId = decrypt($encrypted_id);
            $user = User::findOrFail($userId);

            $specialtyIds = explode(',', $user->specialties);
            $specialties = Specialty::whereIn('id', $specialtyIds)->get();

            $expertiseIds = explode(',', $user->sxpertise);
            $expertises = Expertise::whereIn('id', $expertiseIds)->get();

            $timeSlots = TimeSlot::where('user_id', $userId)
                ->whereDate('date', '>=', now()->toDateString())
                ->orderBy('date', 'asc')
                ->get();

            $uniqueDates = $timeSlots->pluck('date')->unique()->map(function ($date) {
                return \Carbon\Carbon::parse($date);
            });

            $currentDate = $date ? \Carbon\Carbon::parse($date) : $uniqueDates->first();
            $currentIndex = $uniqueDates->search($currentDate);
            $prevDate = $currentIndex > 0 ? $uniqueDates->get($currentIndex - 1) : null;
            $nextDate = $currentIndex < $uniqueDates->count() - 1 ? $uniqueDates->get($currentIndex + 1) : null;

            $sliders = Slider::where('category', 'home')->latest()->take(5)->get();

            $faqQuestions = FaqQuestion::with(['answers' => function ($query) use ($userId) {
                $query->where('user_id', $userId);
            }])->get();
            $heroWebImage = WebImage::where('page', 'about')->first();
            $pageContent = WebContent::first();
            return view('home.about-doctor-map', [
                'user' => $user,
                'specialties' => $specialties,
                'expertises' => $expertises,
                'timeSlots' => $timeSlots,
                'sliders' => $sliders,
                'faqQuestions' => $faqQuestions,
                'uniqueDates' => $uniqueDates,
                'currentDate' => $currentDate,
                'prevDate' => $prevDate,
                'nextDate' => $nextDate,
                'heroWebImage' => $heroWebImage,
                'pageContent' => $pageContent,
            ]);
        } catch (DecryptException $e) {
            return redirect()->route('home.home')->withErrors('Invalid user profile link.');
        }
    }

    public function getTimeSlots(Request $request)
    {
        $date = $request->input('date');
        $userId = $request->input('user_id');

        // Convert date to the correct format
        $formattedDate = \Carbon\Carbon::createFromFormat('Y-m-d', $date)->toDateString();

        $timeSlots = TimeSlot::where('user_id', $userId)
            ->whereDate('date', $formattedDate)
            ->where(function ($query) {
                $query->whereNull('duration')
                    ->orWhere('duration', '');
            })
            ->orderBy('from_time', 'asc')
            ->get(['id', 'from_time']);

        return response()->json(['timeSlots' => $timeSlots]);
    }



    public function fetchFaqAnswer(Request $request)
    {
        try {
            $questionId = $request->input('question_id');
            $userId = $request->input('user_id');
            $faqAnswer = FaqAnswer::where('faq_id', $questionId)
                ->where('user_id', $userId)
                ->first();

            if ($faqAnswer) {
                $answer = $faqAnswer->answer;
            } else {
                $answer = 'Answer not available.';
            }

            return response()->json(['answer' => $answer]);
        } catch (DecryptException $e) {
            return response()->json(['error' => 'Invalid user ID or question ID.'], 500);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error.'], 500);
        }
    }

    public function allDoctormap(Request $request)
    {
        $users = Session::get('search_results', []); // Get search results from session
        $pageContent = WebContent::first();

        // Check if users array is empty
        if (count($users) == 0) {
            return view('home.all-in-map', [
                'users' => $users,
                'pageContent' => $pageContent,
                'noData' => true // Add a flag to show no data message
            ]);
        }

        return view('home.all-in-map', compact('users', 'pageContent'));
    }

    public function getUserDetails(Request $request)
    {
        $userId = $request->input('user_id');
        $user = User::find($userId);

        if ($user) {
            // Retrieve specialties and languages based on IDs
            $specialtyIds = explode(',', $user->specialties);
            $languageIds = explode(',', $user->language);
            $expertiseId = explode(',', $user->sxpertise);

            $specialties = Specialty::whereIn('id', $specialtyIds)->get(['name']);
            $languages = Language::whereIn('id', $languageIds)->get(['name']);
            $expertises = Expertise::whereIn('id', $expertiseId)->get(['name']);
            $specialityList = explode(',', $user->speciality);
            return response()->json([
                'first_name' => $user->first_name,
                'is_online' => $user->is_online,
                'address' => $user->address,
                'latitude' => $user->latitude,
                'longitude' => $user->longitude,
                'fax_number' => $user->fax_number,
                'title' => $user->title,
                'last_name' => $user->last_name,
                'fax_phone_number' => $user->fax_number,
                'house_number' => $user->house_number,
                'postal_code' => $user->postal_code,
                'cityName' => $user->cityRelation->name,
                'speciality' => $specialityList,
                'specialties' => $specialties->map(function ($specialty) {
                    return ['name' => $specialty->name];
                }),
                'languages' => $languages->map(function ($language) {
                    return ['name' => $language->name];
                }),
                'expertise' => $expertises->map(function ($expertise) {
                    return ['name' => $expertise->name];
                }),
            ]);
        } else {
            return response()->json(['error' => 'User not found'], 404);
        }
    }


    public function searchInstitutes(Request $request)
    {
        // Start a query on the User model with a role of 'institute'
        $query = User::where('role', 'institute');

        // Filter by institute name if provided
        if ($request->filled('institutes')) {
            $query->where('first_name', 'like', '%' . $request->institutes . '%');
        }

        // Filter by city if provided
        if ($request->filled('city')) {
            $query->where('city', $request->city);
        }

        // Get the total number of matching institutes
        $totalDoctors = $query->count();
        $noDoctorsFound = $totalDoctors === 0;

        // Paginate the results
        $institutes = $query->paginate(10);

        // Retrieve additional data for the view
        $specialties = Specialty::all();
        $locations = City::whereIn('id', User::pluck('city'))->get();
        $networks = DoctorNetwork::all();
        $sliders = Slider::where('category', 'home')->latest()->take(5)->get();
        $heroWebImage = WebImage::where('page', 'search')->first();
        $pageContent = WebContent::first();

        // Return the view with the data
        return view(
            'home.institutes-results',
            compact(
                'institutes',
                'specialties',
                'locations',
                'networks',
                'sliders',
                'heroWebImage',
                'pageContent',
                'totalDoctors',
                'noDoctorsFound'
            )
        );
    }



    public function showInstituteMembers($userId)
    {
        // Check if the user is an institute
        $user = User::find($userId);
    
        if ($user && $user->role == 'institute') {
            // Check if the institute has members in the MemberGroup table
            $memberIds = MemberGroup::where('host_id', $user->id)->pluck('user_id');
    
            // Retrieve the member details from the users table
            $members = User::with(['timeSlots' => function ($query) {
                $query->where('date', '>=', now());
            }])
            ->whereIn('id', $memberIds)
            ->get();
    
            // Retrieve average ratings and review counts for the members
            $ratings = Review::whereIn('user_id', $memberIds)
                ->select('user_id', DB::raw('AVG(rating) as average_rating'), DB::raw('COUNT(*) as review_count'))
                ->groupBy('user_id')
                ->get()
                ->keyBy('user_id');
    
            // Attach ratings to each member
            $members->each(function ($member) use ($ratings) {
                $member->average_rating = (float) ($ratings[$member->id]->average_rating ?? 0);
                $member->review_count = $ratings[$member->id]->review_count ?? 0;
            });
    
        } else {
            $members = collect(); // Return an empty collection if not an institute
        }
    
        return view('home.home', compact('user', 'members'));
    }
    
    public function showPrice(){

        return view('home.price-list');
    }

}
