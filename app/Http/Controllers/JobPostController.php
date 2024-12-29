<?php

namespace App\Http\Controllers;
use App\Models\JobPost;
use App\Models\User;
use App\Models\Slider;
use App\Models\JobCategory;
use App\Models\WebContent;


use Illuminate\Http\Request;


class JobPostController extends Controller
{
    public function jobPost()
    {
        $admin = auth()->user();
        $user = $admin->user;
        $sliders = Slider::latest()->take(5)->get();
        $jobCategories = JobCategory::all();

        return view('job-post', compact('user', 'sliders', 'jobCategories'));
    }
    public function jobList()
    {
        $admin = auth()->user();
        $user = $admin->user;
        $sliders = Slider::latest()->take(5)->get();
        
        // Use paginate instead of all() to enable pagination
        $jobs = JobPost::paginate(10); // Adjust the number (10) to the number of items you want per page
    
        return view('job-lists', compact('sliders', 'jobs'));
    }
    
    public function edit($id)
    {
        $jobs = JobPost::findOrFail($id);
        $jobCategories = JobCategory::all();
        // Pass the job post data to the edit view
        return view('edit-job', compact('jobs','jobCategories'));
    }
public function update(Request $request, $id)
{
    $job = JobPost::findOrFail($id);

    // Validate and update the job post
    $request->validate([
        'cat_id' => 'required|integer',
        'city_id' => 'required|integer',
        'job_title' => 'required|string|max:255',
        'organization' => 'required|string|max:255',
        'job_details' => 'required',
        'type' => 'required|string',
        'job_contract' => 'required|string',
        'priority' => 'required|string',
        'salary' => 'nullable|string',
        'address' => 'nullable|string',
        'email' => 'nullable|email',
        'phone' => 'nullable|string',
        'opening_hour' => 'nullable|string',
        'end_date' => 'nullable|date',
    ]);
    $job->update([
        'cat_id' => $request->input('cat_id'),
        'city_id' => $request->input('city_id'),
        'job_title' => $request->input('job_title'),
        'start_date' => $request->input('organization'),
        'job_details' => $request->input('job_details'),
        'type' => $request->input('type'),
        'job_contract' => $request->input('job_contract'),
        'priority' => $request->input('priority'),
        'salary' => $request->input('salary'),
        'address' => $request->input('address'),
        'email' => $request->input('email'),
        'phone' => $request->input('phone'),
        'opening_hour' => $request->input('opening_hour'),
        'end_date' => $request->input('end_date'),
    ]);
   

    return redirect()->back()->with('success', 'Job Updated successfully!');
}

    public function destroy($id)
    {
        $job = JobPost::findOrFail($id);
        $job->delete();

        return redirect()->route('jobPosts.index')->with('success', 'Job post removed successfully!');
    }
    public function store(Request $request)
{
    $admin = auth()->user();
    $user = $admin->user;
    
    // Validate the request inputs
    $request->validate([
        'cat_id' => 'required|exists:job_categories,id',
        'city_id' => 'required|string',
        'job_title' => 'required|string|max:255',
        'type' => 'required|string',
        'job_details' => 'required|string',
        'end_date' => 'required|string',
        'organization' => 'required|string|max:255', // Adding validation for organization
    ]);

    // dd($request->type);
    // Create a new job post with the provided data
    JobPost::create([
        'user_id' => $user->id,
        'cat_id' => $request->cat_id,
        'job_title' => $request->job_title,
        'job_details' => $request->job_details,
        'city_id' => $request->city_id,
        'job_contract' => $request->job_contract,
        'salary' => $request->salary,
        'address' => $request->address,
        'email' => $request->email,
        'phone' => $request->phone,
        'opening_hour' => $request->opening_hour,
        'priority' => $request->priority,
        'end_date' => $request->end_date,
        'start_date' => $request->organization, // Save organization data to start_date column
        'type' => $request->type,
    ]);

    return redirect()->back()->with('success', 'Job posted successfully!');
}

    public function careerPost()
    {
        $pageContent = WebContent::first();
        $jobPosts = JobPost::latest()->get(); 
        $jobCategories = JobCategory::all();
        return view('home.career', compact('pageContent', 'jobPosts','jobCategories'));
    }
    public function jobPostdetails($id)
    {
        $decryptedId = decrypt($id);  
        $jobPost = JobPost::findOrFail($decryptedId); 
        $pageContent = WebContent::first();
        return view('home.job-details', compact('jobPost', 'pageContent'));
    }

    public function jobSearch(Request $request)
    {
        // Get all job categories and cities for the search form
        $jobCategories = JobCategory::all();

        // Filter the job posts based on the search criteria
        $query = JobPost::query();

        if ($request->has('category') && $request->category) {
            $query->where('cat_id', $request->category);
        }

        if ($request->has('location') && $request->location) {
            $query->where('city_id', $request->location);
        }

        if ($request->has('type') && $request->type) {
            $query->where('type', $request->type);
        }

        $jobPosts = $query->paginate(10);
        $pageContent = WebContent::first();
        return view('home.job-search', compact('jobPosts', 'jobCategories','pageContent'));
    }


    public function indexCategories()
    {
        $categories = JobCategory::paginate(10);
        return view('admin.job-categories.index', compact('categories'));
    }

    public function createCategory()
    {
        return view('admin.job-categories.create');
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);

        JobCategory::create($request->all());
        return redirect()->back()->with('success', 'Category added successfully!');
       
    }

    public function editCategory($id)
    {
        $category = JobCategory::findOrFail($id);
        return view('admin.job-categories.edit', compact('category'));
    }

    public function updateCategory(Request $request, $id)
    {
        $category = JobCategory::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);

        $category->update($request->all());

        return redirect()->route('jobCategories.index')->with('success', 'Category updated successfully!');
    }

    public function deleteCategory($id)
    {
        $category = JobCategory::findOrFail($id);
        $category->delete();

        return redirect()->route('jobCategories.index')->with('success', 'Category deleted successfully!');
    }

    public function indexWeb()
    {
       
        return view('admin.web-pages.index', compact('contents'));
    }
}