<?php

namespace App\Http\Controllers;

use App\Models\WebImage;
use App\Models\WebContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class WebContentController extends Controller
{
    public function show()
    {
        $admin = auth()->user();
        $user = $admin->user;
        $webImages = WebImage::all();
        return view('admin.web-content', compact('user', 'webImages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'page' => 'nullable|string|max:255',
        ]);

        $file = $request->file('image');
        $imageName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move('images/web', $imageName);

        WebImage::create([
            'image' => 'images/web/' . $imageName,
            'page' => $request->page,
        ]);

        return redirect()->back()->with('success', 'Image added successfully.');
    }

    public function edit(WebImage $webImage)
    {
        return response()->json($webImage);
    }

    public function update(Request $request, WebImage $webImage)
    {
        $request->validate([
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'page' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            // Delete the old image
            if (File::exists($webImage->image)) {
                File::delete($webImage->image);
            }

            // Store the new image
            $file = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move('images/web', $imageName);

            $webImage->image = 'images/web/' . $imageName;
        }

        $webImage->page = $request->page;
        $webImage->save();

        return redirect()->route('web-content.show')->with('success', 'Image updated successfully.');
    }

    public function destroy(WebImage $webImage)
    {
        // Delete the image
        if (File::exists($webImage->image)) {
            File::delete($webImage->image);
        }

        $webImage->delete();

        return redirect()->route('web-content.show')->with('success', 'Image deleted successfully.');
    }

    public function webContenPageEdit()
    {   
        $admin = auth()->user();
        $user = $admin->user;
        $webContent = WebContent::first(); // Assuming there is only one row in the table
        return view('admin.web-content-editor', compact('user','webContent'));
    }

    public function webContenPageUpdate(Request $request)
        {
             // dd($request->all());
            // $request->validate([
            //     'main_header_cover_title' => 'required|string',
            //     'main_header_title' => 'required|string',
            //     'main_header_cardi_title' => 'required|string',
            //     'main_header_cardi_desc' => 'required|string',
            //     'main_header_cardii_title' => 'required|string',
            //     'main_header_cardii_desc' => 'required|string',
            //     'main_header_cardiii_title' => 'required|string',
            //     'main_header_cardiii_desc' => 'required|string',
            //     'main_header_cardiv_title' => 'required|string',
            //     'main_header_cardiv_desc' => 'required|string',
            //     'main_header_cardv_title' => 'required|string',
            //     'main_header_cardv_desc' => 'required|string',
            //     'main_header_cardvi_title' => 'required|string',
            //     'main_header_cardvi_desc' => 'required|string',
            //     'main_header_center_title' => 'required|string',
            //     'main_header_center_text' => 'required|string',
            //     'main_header_center_left_top_title' => 'required|string',
            //     'main_header_center_left_top_title_desc' => 'required|string',
            //     'main_header_center_left_bottom_title' => 'required|string',
            //     'main_header_center_left_bottom_title_desc' => 'required|string',
            //     'main_header_center_left_right_title' => 'required|string',
            //     'main_header_center_left_right_title_desc' => 'required|string',
            //     'main_header_footer_title' => 'required|string',
            //     'main_header_footer_text' => 'required|string',
            //     'main_header' => 'required|string',
            // ]);

            $webContent = WebContent::first(); // Assuming there is only one row in the table

            $webContent->update($request->all());

            return redirect()->back()->with('success', 'Web content updated successfully.');
        }

}
