<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sections = Section::whereUserId(userLogin())->latest()->paginate(5);
        return view('adminPanel.section.index', compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('adminPanel.section.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'long_title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:6048',
            'status' => 'required|in:1,2'
        ], [
            'title.required' => 'The Section Header is required.',
            'long_title.required' => 'The Section Title is required.',
            'description.required' => 'The Section Description is required.',
            'image.required' => 'The Section Image is required.',
            'image.image' => 'The Section Image must be an image file.',
            'image.mimes' => 'The Section Image must be a file of type: jpeg, png, jpg, gif, svg.',
            'image.max' => 'The Section Image may not be greater than 2MB.',
            'status.required' => 'The Status is required.',
            'status.in' => 'The selected Status is invalid.',
        ]);

        $data = $request->all();
        $data['user_id'] = userLogin();
        $data['image'] = $this->saveImage($request);
        Section::create($data);

        return redirect()->route('admin-section.index')->with('success', 'Section Created Successfully');
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
        $section = Section::where('user_id',userLogin())->find($id);
        abort_if(is_null($section),404);
        return view('adminPanel.section.edit',compact('section'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'long_title' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:6048',
            'status' => 'required|in:1,2'
        ], [
            'title.required' => 'The Section Header is required.',
            'long_title.required' => 'The Section Title is required.',
            'description.required' => 'The Section Description is required.',
            'image.image' => 'The Section Image must be an image file.',
            'image.mimes' => 'The Section Image must be a file of type: jpeg, png, jpg, gif, svg.',
            'image.max' => 'The Section Image may not be greater than 2MB.',
            'status.required' => 'The Status is required.',
            'status.in' => 'The selected Status is invalid.',
        ]);

        $slider = Section::whereUserId(userLogin())->find($id);
        abort_if(is_null($slider), 404);

        // Update the fields
        $slider->title = $request->input('title', $slider->title);
        $slider->status = $request->input('status', $slider->status);

        if ($request->hasFile('image')) {
            $slider->image = $this->saveImage($request);
        }

        $slider->save();

        return redirect()->route('admin-section.index')->with('success', 'Section Updated Successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $slider = Section::where('user_id',userLogin())->find($id);
        abort_if(is_null($slider),404);
        $slider->delete();
        return redirect()->route('admin-section.index')->with('success', 'Section Deleted Successfully');
    }
}
