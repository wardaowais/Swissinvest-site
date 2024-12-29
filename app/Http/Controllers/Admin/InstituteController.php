<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Crypt;
use App\Models\Institute;
use App\Models\User;
use App\Models\MemberGroup;
use App\Models\MemberTitle;
use App\Models\Specialty;
use App\Models\Booking;
use App\Models\Patient;
use App\Models\Disease;
use App\Models\Expertise; 
use App\Models\Country; 
use App\Models\Language; 
use App\Models\Canton; 

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InstituteController extends Controller
{
    public function index()
    {
        $institutes = Institute::paginate(10);
        return view('admin.institutes.index', compact('institutes'));
    }

    public function create()
    {
        return view('admin.institutes.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'city_id' => 'nullable|exists:cities,id',
            'country_id' => 'nullable|exists:countries,id',
            'area_code' => 'nullable|string|max:10',
            'address' => 'nullable|string|max:255',
            'contact_info' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:15',
            'email' => 'nullable|email|max:255',
            'details' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/institutes'), $imageName);

            $validatedData['image'] = 'images/institutes/' . $imageName;
        }

        Institute::create($validatedData);

        return redirect()->route('institutes.index')->with('success', 'Institute added successfully!');
    }

    public function edit(Institute $institute)
    {
        return view('admin.institutes.edit', compact('institute'));
    }

    public function update(Request $request, $id)
    {
        $institute = Institute::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'city_id' => 'nullable|exists:cities,id',
            'country_id' => 'nullable|exists:countries,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // other validation rules...
        ]);

        $data = $request->except(['image']);

        if ($request->hasFile('image')) {
            // Handle image upload
            $file = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/institute'), $imageName);
            $data['image'] = 'images/institute/' . $imageName;

            // Optionally delete old image here if needed
            if ($institute->image && file_exists(public_path($institute->image))) {
                unlink(public_path($institute->image));
            }
        }

        $institute->update($data);

        return redirect()->route('institutes.index')->with('success', 'Institute updated successfully!');
    }


    public function destroy(Institute $institute)
    {
        $institute->delete();
        return redirect()->route('institutes.index')->with('success', 'Institute deleted successfully.');
    }


    public function addUsers(Request $request, $id)
    {
        $institute = Institute::findOrFail($id);
        $users = collect();  // Start with an empty collection

        if ($request->has('search')) {
            $search = $request->input('search');
            $users = User::where('first_name', 'like', '%' . $search . '%')
                ->orWhere('last_name', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%')
                ->orWhere('phone', 'like', '%' . $search . '%')
                ->get();
        }

        return view('admin.institutes.add-users', compact('institute', 'users'));
    }

    public function addUserToInstitute(Request $request, $id, $userId)
    {
        $user = User::findOrFail($userId);
        $user->institute_id = $id;
        $user->save();

        return redirect()->back()->with('success', 'User added to institute successfully!');
    }

    public function members($id)
    {
        $institute = Institute::findOrFail($id);
        $members = User::where('institute_id', $id)->get();

        return view('admin.institutes.members', compact('institute', 'members'));
    }
    public function removeUser($institute_id, $user_id)
    {
        $user = User::findOrFail($user_id);
        $user->institute_id = null;
        $user->save();

        return redirect()->route('institutes.members', $institute_id)->with('success', 'User removed from the institute successfully.');
    }



    // professional panel 
    public function showGroupMembers()
    {
        // Get the authenticated user
        $admin = auth()->user();
        $user = $admin->user;
		
        // Check if the admin is the host in any member group
        $memberGroups = MemberGroup::where('host_id', $user->id)->get();
		
        // If member groups exist, get the users who are members
        $members = collect(); // Initialize as an empty collection
        if ($memberGroups->isNotEmpty()) {
            $members = User::whereIn('id', $memberGroups->pluck('user_id'))->get();
        }

        // Return the view with the members data
        return view('member-groups.group-members', compact('members',));
    }
    public function showGroupUserDetails($id)
    {
        $memberId = decrypt($id);
        $member = User::findOrFail($memberId);
        $country = Country::find($member->country);
        $language = Language::find($member->language);
        $countryName = $country ? $country->name : null;
        $languageName = $language ? $language->name : null;
        $countries = Country::all();
        $specialties =Specialty::all();
        $diseases =Disease::all();
        $cantons = Canton::all();
        $titles = MemberTitle::all();
        $expertises = Expertise::all();
        return view('member-groups.group-user-details', [
            'member' => $member,
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
    public function editMember($id)
    {
        $memberId = decrypt($id);
        $member = User::findOrFail($memberId);
        $country = Country::find($member->country);
        $language = Language::find($member->language);
        $countryName = $country ? $country->name : null;
        $languageName = $language ? $language->name : null;
        $countries = Country::all();
        $specialties =Specialty::all();
        $diseases =Disease::all();
        $cantons = Canton::all();
        $titles = MemberTitle::all();
        $expertises = Expertise::all();
       
        return view('member-groups.edit-member', [
            'member' => $member,
            'countryName' => $countryName,
            'languageName' => $languageName,
            'countries' => $countries,
            'cantons' => $cantons,
            'titles' => $titles,
            'specialties' => $specialties,
            'expertises' => $expertises,
            'diseases' =>  $diseases,
         
           
        ]);
        // return view('member-groups.edit-member', compact('member','titles', 'specialties', 'diseases', 'expertises'));
    }
    public function createGroupmember()
    {

        $titles = MemberTitle::all();
        $specialties = Specialty::all();
        $diseases = Disease::all();
        $expertises = Expertise::all();
        // Return the view with the user data
        return view('member-groups.group-user-create', compact('titles', 'specialties', 'diseases', 'expertises'));
    }

    public function storeGroupMember(Request $request)
    {
        // Validate the form data
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // Add other validation rules as needed
        ]);

        // Check if a user with the same details already exists
        $existingUser = User::where('first_name', $request->input('first_name'))
            ->where('last_name', $request->input('last_name'))
            ->where('email', $request->input('email'))
            ->where('postal_code', $request->input('postal_code'))
            ->first();

        if ($existingUser) {
            return back()->withInput()->withErrors(['error' => 'User with these details already exists. Please contact support at info@doctomed.ch.']);
        }

        // Handle the profile picture upload
        $profilePicName = null;
        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $profilePicName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/users'), $profilePicName);
        }

        // Create the new user
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'role' => 'guser', // Group user
            'gender' => $request->gender,
            'age' => $request->age,
            'country' => $request->country,
            'city' => $request->city,
            'language' => is_array($request->language) ? implode(',', $request->language) : $request->language, // Check if it's an array before implode
            'profile_pic' => $profilePicName, // Save only the file name
            'phone' => $request->phone,
            'postal_code' => $request->postal_code,
            'address' => $request->address,
            'specialty' => $request->specialty,
            'specialties' => is_array($request->specialties) ? implode(',', $request->specialties) : $request->specialties,
            'sxpertise' => is_array($request->sxpertise) ? implode(',', $request->sxpertise) : $request->sxpertise,
            'about_me' => $request->about_me,
            'title' => $request->title,
            'house_number' => $request->house_number,
        ]);

        $admin = auth()->user();
        $host = $admin->user;

        // Create the MemberGroup entry
        MemberGroup::create([
            'host_id' => $host->id, // Assuming the current user is the host
            'user_id' => $user->id,
            'status' => 'active', // Or any other default status you want to set
        ]);

        // Redirect or return a response
        return redirect()->route('group.members')->with('success', 'Member created successfully.');
    }


    public function showGroupmemberbookingDetails($booking_id)
    {

        $booking_id = decrypt($booking_id);


        // Retrieve the booking using the decrypted ID
        $booking = Booking::find($booking_id);

        if (!$booking) {
            // Handle the case where the booking is not found
            abort(404, 'Booking not found');
        }

        // Retrieve the related user and patient information
        $member = User::find($booking->user_id);

        $patient = Patient::find($booking->pt_id);
        return view('member-groups.booking-details', compact('booking', 'member', 'patient'));
    }

    public function accept($id)
    {
        $booking = Booking::find($id);

        if (!$booking) {
            return redirect()->back()->with('error', 'Booking not found');
        }

        $booking->status = 'Completed';
        $booking->booking_status = 'Completed';
        $booking->save();

        return redirect()->route('dashboard')->with('success', 'Booking accepted successfully');
    }

    //Group member Method to cancel a booking
    public function cancel($id)
    {
        $booking = Booking::find($id);

        if (!$booking) {
            return redirect()->back()->with('error', 'Booking not found');
        }

        $booking->status = 'Canceled';
        $booking->booking_status = 'Canceled';
        $booking->save();

        return  redirect()->route('dashboard')->with('success', 'Booking canceled successfully');
    }


    public function updateMember(Request $request, $id){

        $memberId=decrypt($id);

        $member = User::findOrFail($memberId);
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
        $member->update([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'gender' => $request->input('gender'),
            'age' => $request->input('age'),
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
    }

    public function uploadMemberProfilePic(Request $request)
    {
    $request->validate([
        'profile_pic' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $memberId = decrypt($request->input('member_id')); // Decrypt the member ID
    $member = User::findOrFail($memberId);
    if ($request->hasFile('profile_pic')) {
        $file = $request->file('profile_pic');
        $imageName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move('images/users', $imageName);

        // Update the profile_pic field in the users table
        $member->profile_pic = $imageName;
        $member->save();

        return response()->json([
            'success' => true,
            'profile_pic_url' => asset($member->profile_pic),
        ]);
    }

    return response()->json([
        'success' => false,
        'message' => 'No file uploaded.',
    ]);
}
    
}
