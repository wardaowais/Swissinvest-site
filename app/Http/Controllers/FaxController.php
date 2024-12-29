<?php

namespace App\Http\Controllers;
use App\Models\JobPost;
use App\Models\User;
use App\Models\Slider;
use App\Models\JobCategory;
use App\Models\WebContent;


use Illuminate\Http\Request;


class FaxController extends Controller
{
    public function index()
    {
        return view('fax');
    }
}