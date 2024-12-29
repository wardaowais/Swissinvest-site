<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(){
        $row = Setting::whereUserId(userLogin())->first();
        return view('adminPanel.dashboard.update_setting',compact('row'));
    }

    public function update(Request $request){
        $setting = Setting::whereUserId(userLogin())->first();
        $requestData = $request->all();
        if ($setting) {

            if ($request->file('website_logo')!=null){
                $requestData['website_logo'] = $this->saveImage($request);
            }
            if ($request->file('fav_icon')!=null){
                $requestData['fav_icon'] = $this->savefav($request);
            }
            $setting->update($requestData);

        } else {
            $data = $requestData;
            $data['user_id'] = userLogin();
            if ($request->file('website_logo')!=null){
                $data['website_logo'] = $this->saveImage($request);
            }
            if ($request->file('fav_icon')!=null){
                $data['fav_icon'] = $this->savefav($request);
            }
            $data = Setting::create($data);
        }

        return redirect()->back()->with('success', 'Settings Updated Successfully');
    }

    public $image, $imageName, $imageUrl, $directory;
    public function saveImage($request)
    {
        $this->image = $request->file('website_logo');
        $this->imageName = rand().'.'.$this->image->getClientOriginalExtension();
        $this->directory = 'upload/website/';
        $this->imageUrl = $this->directory . $this->imageName;
        $this->image->move($this->directory, $this->imageName);
        return $this->imageUrl;
    }
    public function savefav($request)
    {
        $this->image = $request->file('fav_icon');
        $this->imageName = rand().'.'.$this->image->getClientOriginalExtension();
        $this->directory = 'upload/website/';
        $this->imageUrl = $this->directory . $this->imageName;
        $this->image->move($this->directory, $this->imageName);
        return $this->imageUrl;
    }

}
