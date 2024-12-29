<?php

namespace App\Http\Controllers;

use App\Models\Expertise;
use Illuminate\Http\Request;

class ExpertiseController extends Controller
{
    public function index()
    {
        $admin = auth()->user();
        $user = $admin->user;
        $expertises = Expertise::all();
        return view('admin.expertises', compact('user','expertises'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Expertise::create(['name' => $request->name]);

        return redirect()->route('expertises.index')->with('success', 'Expertise added successfully.');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        
        $id = $request->input('expertise_id');
        $expertise = Expertise::findOrFail($id);
        $expertise->name = $request->name;
        $expertise->save();

        return redirect()->route('expertises.index')->with('success', 'Expertise updated successfully.');
    }

    public function destroy($id)
    {
        $expertise = Expertise::findOrFail($id);
        $expertise->delete();

        return redirect()->route('expertises.index')->with('success', 'Expertise deleted successfully.');
    }
}
