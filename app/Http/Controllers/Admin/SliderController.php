<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MiniSlider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $slider = MiniSlider::whereUserId(userLogin())->latest()->paginate(5);
        return view('adminPanel.slider.index', compact('slider'));
    }

    public function getSlider($user_id)
    {
        // Retrieve sliders for the specified user with a status of 1, ordered by latest
        $slider = MiniSlider::where('user_id', $user_id)->where('status', 1)->latest()->get();

        // Transform the data if necessary, e.g., to include only certain fields
        $sliderData = $slider->map(function ($slide) {
            return [
                'id' => $slide->id,
                'title' => $slide->title,
                'image' => asset($slide->image), // Assuming the image path is stored in 'image'
                'alt' => $slide->title, // Assuming you want to use the title as the alt text
            ];
        });

        // Return the data as a JSON response
        return response()->json(['images' => $sliderData]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('adminPanel.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image'=>'required'
        ]);
        $data = $request->all();
        $data['user_id'] = userLogin();
        $data['image'] = $this->saveImage($request);
        MiniSlider::create($data);
        return redirect()->route('admin.slider.update')->with('success','Slider Created Successfully');
    }

    public $image, $imageName, $imageUrl, $directory;
    public function saveImage($request)
    {
        $this->image = $request->file('image');
        $this->imageName = rand().'.'.$this->image->getClientOriginalExtension();
        $this->directory = 'uploads/';
        $this->imageUrl = $this->directory . $this->imageName;
        $this->image->move($this->directory, $this->imageName);
        return $this->imageUrl;
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $slider = MiniSlider::where('user_id',userLogin())->find($id);
        abort_if(is_null($slider),404);
        return view('adminPanel.slider.edit',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
    	$id = $request->input('id');
        $request->validate([
            'image' => 'nullable|image', // Added image validation rule
        ]);

        $slider = MiniSlider::whereUserId(userLogin())->find($id);
        abort_if(is_null($slider), 404);

        // Update the fields
        $slider->title = $request->input('title', $slider->title);
        $slider->status = $request->input('status', $slider->status);

        if ($request->hasFile('image')) {
            $slider->image = $this->saveImage($request);
        }

        $slider->save();

        return redirect()->route('admin.slider.update')->with('success', 'Slider Updated Successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $slider = MiniSlider::where('user_id',userLogin())->find($id);
        abort_if(is_null($slider),404);
        $slider->delete();
        return redirect()->route('admin-slider.index')->with('success', 'Slider Deleted Successfully');
    }
}
