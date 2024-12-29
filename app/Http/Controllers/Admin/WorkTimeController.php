<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WorkTime;
use Illuminate\Http\Request;

class WorkTimeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $works = WorkTime::whereUserId(userLogin())->latest()->paginate(10);
        return view('adminPanel.work.index',compact('works'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('adminPanel.work.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'day'=>'required',
            'time'=>'required'
        ]);
        $data = $request->all();
        $data['user_id'] = userLogin();
        WorkTime::create($data);
        return redirect()->route('admin.work.update')->with('success', 'Working Hours Updated Successfully');
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
        $workHour = WorkTime::where('user_id',userLogin())->find($id);
        abort_if(is_null($workHour),404);
        return view('adminPanel.work.edit',compact('workHour'));
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
        $works = WorkTime::whereUserId(userLogin())->find($id);
        abort_if(is_null($works), 404);
        $data = $request->all();
        $works->update($data);
        return redirect()->route('admin.work.update')->with('success', 'Working Hours Updated Successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $works = WorkTime::where('user_id',userLogin())->find($id);
        abort_if(is_null($works),404);
        $works->delete();
        return redirect()->route('admin-work.index')->with('success', 'Working Hours Deleted Successfully');
    }
}
