<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feature;

class FeatureController extends Controller
{
    // Display a listing of the features
    public function index()
    {
        $features = Feature::all();
        return view('admin.fetaure-details.index', compact('features'));
    }

    // Show the form for creating a new feature
    public function create()
    {
        return view('admin.fetaure-details.create');
    }

    // Store a newly created feature in the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'key_name' => 'required|string|max:255|unique:features',
            'status' => 'required|boolean',
        ]);

        Feature::create($request->all());

        return redirect()->route('features.index')->with('success', 'Feature created successfully.');
    }

    // Show the form for editing an existing feature
    public function edit(Feature $feature)
    {
        return view('admin.fetaure-details.edit', compact('feature'));
    }

    // Update the specified feature in the database
    public function update(Request $request, Feature $feature)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'key_name' => 'required|string|max:255|unique:features,key_name,' . $feature->id,
            'status' => 'required|boolean',
        ]);

        $feature->update($request->all());

        return redirect()->route('features.index')->with('success', 'Feature updated successfully.');
    }

    // Remove the specified feature from the database
    public function destroy(Feature $feature)
    {
        $feature->delete();

        return redirect()->route('features.index')->with('success', 'Feature deleted successfully.');
    }
}
