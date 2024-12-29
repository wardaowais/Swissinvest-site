<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Specialty;
use Illuminate\Http\Request;

class SpecialtyController extends Controller
{
    public function index()
    {
        $admin = auth()->user();
        $user = $admin->user;
        $specialties = Specialty::all();
        return view('admin.specialties', compact('user','specialties'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Specialty::create(['name' => $request->name]);

        return redirect()->route('specialties.index')->with('success', 'Specialty added successfully.');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $id =$request->input('specialty_id');
        $specialty = Specialty::findOrFail($id);
        $specialty->name = $request->name;
        $specialty->save();

        return redirect()->route('specialties.index')->with('success', 'Specialty updated successfully.');
    }

    public function destroy($id)
    {
        $specialty = Specialty::findOrFail($id);
        $specialty->delete();

        return redirect()->route('specialties.index')->with('success', 'Specialty deleted successfully.');
    }
}
