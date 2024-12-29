<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SurveyCategory;
class SurveyCategoryController extends Controller
{
   
    public function index()
    {
        $categories = SurveyCategory::all();
        return view('admin.survey_categories.index', compact('categories'));
    }

    // Show the form for creating a new category
    public function create()
    {
        return view('admin.survey_categories.create');
    }

    // Store a newly created category in storage
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'background_color' => 'nullable|string|max:7', // Validate color
        ]);
    
        SurveyCategory::create([
            'name' => $request->name,
            'background_color' => $request->background_color, // Save color
        ]);
    
        return redirect()->route('survey_categories.index')->with('success', 'Category created successfully.');
    }
    

    // Show the form for editing the specified category
    public function edit(SurveyCategory $surveyCategory)
    {
        return view('admin.survey_categories.edit', compact('surveyCategory'));
    }

    // Update the specified category in storage
   public function update(Request $request, SurveyCategory $surveyCategory)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'background_color' => 'nullable|string|max:7', // Validate color
    ]);

    $surveyCategory->update([
        'name' => $request->name,
        'background_color' => $request->background_color, // Update color
    ]);

    return redirect()->route('survey_categories.index')->with('success', 'Category updated successfully.');
}


    // Remove the specified category from storage
    public function destroy(SurveyCategory $surveyCategory)
    {
        $surveyCategory->delete();

        return redirect()->route('survey_categories.index')->with('success', 'Category deleted successfully.');
    }
}
