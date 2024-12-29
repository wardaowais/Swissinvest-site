<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::whereUserId(userLogin())->latest()->paginate(10);
        return view('adminPanel.service.index',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('adminPanel.service.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required'
        ]);
        $data = $request->all();
        $data['user_id'] = userLogin();
        Service::create($data);
        return redirect()->route('admin.service.update')->with('success','Service Created Successfully');
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
        $service = Service::where('user_id',userLogin())->find($id);
        abort_if(is_null($service),404);
        return view('adminPanel.service.edit',compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
    	$id = $request->input('id');
        $request->validate([
            'title'=>'required',
            'description'=>'required'
        ]);
        $works = Service::whereUserId(userLogin())->find($id);
        abort_if(is_null($works), 404);
        $data = $request->all();
        $works->update($data);
        return redirect()->route('admin.service.update')->with('success', 'Service Updated Successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $works = Service::where('user_id',userLogin())->find($id);
        abort_if(is_null($works),404);
        $works->delete();
        return redirect()->route('admin-services.index')->with('success', 'Service Deleted Successfully');
    }
}
