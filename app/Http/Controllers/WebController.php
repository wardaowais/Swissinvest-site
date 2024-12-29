<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Personal;
use App\Models\Section;
use App\Models\Service;
use App\Models\Setting;
use App\Models\SocialMediaLinks;
use App\Models\User;
use App\Models\WorkTime;
use Illuminate\Http\Request;
use Illuminate\Http\Response; // Import the Response class


class WebController extends Controller
{
    public function index(){
        return view("welcome");
    }

    public function userHomePage($id){
        $userDetails = User::find($id);
        // return $userDetails;
        $personInfo = Personal::where('user_id',$userDetails->id)->first();
        $blogs = Blog::where('user_id',$userDetails->id)->whereStatus(1)->latest()->take(3)->get();
        $social = SocialMediaLinks::whereUserId($userDetails->id)->first();
        $workHours = WorkTime::latest()->whereStatus(1)->whereUserId($userDetails->id)->get();
        $services = Service::latest()->whereStatus(1)->whereUserId($userDetails->id)->get();
        $website = Setting::where('user_id',$userDetails->id)->first();
        $sections = Section::latest()->whereStatus(1)->whereUserId($userDetails->id)->get();
        return view('frontEnd.home.index',compact('userDetails','sections','services','personInfo','blogs','social','workHours','website'));
    }


    public function blogDetails($slug){
        $blog = Blog::where('slug',$slug)->firstOrFail();
        $blogs = Blog::latest()->whereStatus(1)->take(3)->get();
        $wordCount = str_word_count(strip_tags($blog->main_content));
        $readingTime = ceil($wordCount / 200);
        $user = User::find($blog->user_id);
        return view('frontEnd.blog.details',compact('user','blog','readingTime','blogs'));
    }


    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads'), $imageName);

        return response()->json(['url' => asset('uploads/' . $imageName)]);
    }



}
