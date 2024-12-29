<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Slider;
use App\Models\NecessaryCategory;
use App\Models\NecessaryUrl; 
use App\Models\NecessarySlider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
class NecessaryCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sponseredDetails()
    {
        $admin = auth()->user();
        $user = $admin->user;
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

        return view('necessary-url', compact('user', 'categories', 'randomLists','sliders'));
    }

    
    public function sponserCatebasedList($cat_id)
    {
        $catId =$cat_id;
        $admin = auth()->user();
        $user = $admin->user;
        $categories = NecessaryCategory::all();
        $useFulLists = NecessaryUrl::where('cat_id', $catId)->with('necessarySliders')->get();
        if($user->role=='user'){
            $sliders = Slider::where('category', 'proPanel')->latest()->take(5)->get();
        }else{
            $sliders = Slider::where('category', 'companyPanel')->latest()->take(5)->get();
        }
        return view('necessary-list', compact('user','useFulLists','categories','sliders'));
    }
    
    public function AdminNecessaryLink(){
        $admin = auth()->user();
        $user = $admin->user;
        $categories = NecessaryCategory::all();
    return view('admin.necessary-link-admin', compact('user','categories'));
    }

    public function necessaryCategorylist(){
        $admin = auth()->user();
        $user = $admin->user;
        $categories = NecessaryCategory::all();
    return view('admin.necessary-category-list', compact('user','categories'));
    }

    public function necessaryCatupdate(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $id = $request->input('cat_id');
        $category = NecessaryCategory::findOrFail($id);
        $category->name = $request->input('name');
        $category->save();

        return redirect()->back()->with('success', 'Category updated successfully.');
    }
    public function store(Request $request)
    {

        $request->validate([
            'category_name' => 'required|string|max:255|unique:necessary_categories,name',
        ]);

        $category = new NecessaryCategory();
        $category->name = $request->category_name;
        $category->status = 1; 
        $category->save();

        return redirect()->back()->with('success', 'Category added successfully!');
    }
    public function storeNecessaryUrl(Request $request)
    {
        $validatedData = $request->validate([
            'category_id' => 'required|exists:necessary_categories,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:255',
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'slider_images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {
            // Handle profile image upload
            $profileImage = $request->file('profile_image');
            $profileImageName = time() . '_' . uniqid() . '.' . $profileImage->getClientOriginalExtension();
            $profileImage->move(public_path('images/apps'), $profileImageName);

            // Create NecessaryUrl entry
            $necessaryUrl = NecessaryUrl::create([
                'cat_id' => $request->category_id,
                'title' => $request->title,
                'description' => $request->description,
                'phone' => $request->phone,
                'email' => $request->email,
                'image' => $profileImageName,
                'address' => $request->address,
            ]);

            Log::info('NecessaryUrl created: ', $necessaryUrl->toArray());

            // Handle slider images upload
            if ($request->hasfile('slider_images')) {
                foreach ($request->file('slider_images') as $file) {
                    $sliderImageName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('images/apps'), $sliderImageName);

                    $slider = NecessarySlider::create([
                        'nec_id' => $necessaryUrl->id,
                        'image' => $sliderImageName,
                    ]);

                    Log::info('NecessarySlider created: ', $slider->toArray());
                }
            }

            return redirect()->back()->with('success', 'Necessary URL and Slider Images added successfully!');
        } catch (\Exception $e) {
            Log::error('Error storing necessary URL: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while adding the necessary URL and slider images.');
        }
    }
    public function sponseredDetailsAdmin()
    {
        $admin = auth()->user();
        $user = $admin->user;
        $categories = NecessaryCategory::all();
        $necessaryUrls = NecessaryUrl::with('necessarySliders', 'necessaryUrlCategory')->get();

        return view('admin.necessary-link-list', compact('user', 'categories', 'necessaryUrls'));
    }
    public function edit($id)
    {
        $admin = auth()->user();
        $user = $admin->user;
        $necessaryUrl = NecessaryUrl::findOrFail($id);
        $categories = NecessaryCategory::all();

        return view('admin.necessary-url-edit', compact('user','necessaryUrl', 'categories'));
    }

   public function update(Request $request, $id)
    {
    // Validate incoming request data
    $request->validate([
        'category_id' => 'required',
        'title' => 'required',
        'description' => 'required',
        'phone' => 'required',
        'email' => 'required|email',
        'address' => 'required',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust file types and size limit as needed
    ]);

    // Find the NecessaryUrl instance by ID
    $necessaryUrl = NecessaryUrl::findOrFail($id);

    // Update fields from the request
    $necessaryUrl->cat_id = $request->category_id;
    $necessaryUrl->title = $request->title;
    $necessaryUrl->description = $request->description;
    $necessaryUrl->phone = $request->phone;
    $necessaryUrl->email = $request->email;
    $necessaryUrl->address = $request->address;

    if ($request->hasFile('image')) {
        if ($necessaryUrl->image) {
            $oldImagePath = public_path('images/apps/' . $necessaryUrl->image);
            
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }

        $file = $request->file('image');
        $imageName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('images/apps'), $imageName);
        $necessaryUrl->image = $imageName;
    }

    $necessaryUrl->save();

    return redirect()->route('sponseredDetailsAdmin')->with('success', 'Necessary URL updated successfully!');
}

    public function destroy($id)
    {
        $necessaryUrl = NecessaryUrl::findOrFail($id);
        
        // Delete associated necessary sliders, if any
        $necessaryUrl->necessarySliders()->delete();

        // Delete the necessary URL record
        $necessaryUrl->delete();

        return redirect()->route('sponseredDetailsAdmin')->with('success', 'Necessary URL deleted successfully!');
    }

    public function cateDestroy($id)
    {
        $necessaryUrl = NecessaryCategory::findOrFail($id);
        
        $necessaryUrl->delete();

        return redirect()->back()->with('success', 'Necessary Category successfully!');
    }
}
