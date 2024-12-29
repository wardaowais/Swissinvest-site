<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use Illuminate\Http\Request;

class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    
        $row = Personal::where('user_id', userLogin())->first();
        return view('adminPanel.dashboard.index', compact('row'));
    }

    public function storeOrUpdate(Request $request)
    {
        $request->validate([
            'name' => 'nullable|string',
            'mini_upper_subtitle' => 'nullable|string',
            'header_paragraph' => 'nullable|string',
            'about_header' => 'nullable|string',
            'slider_status' => 'nullable|boolean',
            'about_status' => 'nullable|boolean',
            'our_service_header' => 'nullable|string',
            'our_service_status' => 'nullable|boolean',
            'blog_header' => 'nullable|string',
            'blog_header_status' => 'nullable|boolean',
            'contact_header' => 'nullable|string',
            'contact_status' => 'nullable|boolean',
            'mobile_header' => 'nullable|string',
            'mobile' => 'nullable|string',
            'email_header' => 'nullable|string',
            'email' => 'nullable|string|email',
            'address_header' => 'nullable|string',
            'address' => 'nullable|string',
            'about_description' => 'nullable|string',
            'about_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
        
        $data = $request->except(['_token', '_method']);
        $data['user_id'] = userLogin();
        // $data['about_image'] = $this->saveImage($request);
        if ($request->file('about_image')) {
            $data['about_image']= $this->saveImage($request);
        }
        Personal::updateOrCreate(
            ['user_id' => $data['user_id']], 
            $data
        );
        return redirect()->back()->with('success', 'Data Updated successfully!');
    }
    
    public $image, $imageName, $imageUrl, $directory;
    public function saveImage($request)
    {
        $this->image = $request->file('about_image');
        $this->imageName = rand().'.'.$this->image->getClientOriginalExtension();
        $this->directory = 'uploads/';
        $this->imageUrl = $this->directory . $this->imageName;
        $this->image->move($this->directory, $this->imageName);
        return $this->imageUrl;
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Personal $personal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Personal $personal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Personal $personal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Personal $personal)
    {
        //
    }
}
