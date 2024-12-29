<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Personal;
use App\Models\MiniSlider;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\WorkTime;
use App\Models\Blog;
use App\Models\Contact;

class MiniHomeController extends Controller
{
    public function sliderUpdate(){
        $row = Personal::where('user_id', userLogin())->first();
        $slider = MiniSlider::whereUserId(userLogin())->latest()->paginate(5);
        return view('adminPanel.home.slider',compact('row','slider'));
    }

    public function aboutUpdate(){
        $row = Personal::where('user_id', userLogin())->first();
        return view('adminPanel.home.about',compact('row'));
    }

    public function serviceUpdate(){
        $row = Personal::where('user_id', userLogin())->first();
        $services = Service::whereUserId(userLogin())->latest()->paginate(10);
        return view('adminPanel.home.service',compact('row','services'));
    }

    public function blogUpdate(){
        $row = Personal::where('user_id', userLogin())->first();
        $blogs = Blog::where('user_id',userLogin())->latest()->paginate(10);
        return view('adminPanel.home.blog',compact('row','blogs'));
    }

    public function workUpdate(){
        $row = Personal::where('user_id', userLogin())->first();
        $works = WorkTime::whereUserId(userLogin())->latest()->paginate(10);
        return view('adminPanel.home.work',compact('row','works'));
    }

    public function contactUpdate(){
        $row = Personal::where('user_id', userLogin())->first();
        $message = Contact::whereUserId(userLogin())->latest()->paginate(10);
        return view('adminPanel.home.contact',compact('row','message'));
    }
}
