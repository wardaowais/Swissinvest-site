<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SurveyCategory;
use App\Models\Survey;
use App\Models\User;

class SurveyController extends Controller
{
    public function index()
    {
        $surveys = Survey::with('category')->get(); // Eager load the category
        return view('admin.survey.index', compact('surveys'));
    }

    public function create()
    {
        $categories = SurveyCategory::all();
        return view('admin.survey.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:survey_categories,id',
            'questions.*.question' => 'required|string',
            'questions.*.type' => 'required|in:multiple_choice,text,yes_no',
            'questions.*.options' => 'nullable|array', // For multiple-choice questions
        ]);

        foreach ($validated['questions'] as $questionData) {
            Survey::create([
                'category_id' => $validated['category_id'],
                'question' => $questionData['question'],
                'type' => $questionData['type'],
                'options' => $questionData['type'] === 'multiple_choice' ? json_encode($questionData['options']) : null,
            ]);
        }

        return redirect()->route('survey.index')->with('success', 'Survey created successfully.');
    }

    public function edit(Survey $survey)
    {
        $categories = SurveyCategory::all();
        return view('admin.survey.edit', compact('survey', 'categories'));
    }

    public function update(Request $request, Survey $survey)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:survey_categories,id',
            'question' => 'required|string',
            'type' => 'required|in:multiple_choice,text,yes_no',
            'options' => 'nullable|array',
        ]);

        $survey->update([
            'category_id' => $validated['category_id'],
            'question' => $validated['question'],
            'type' => $validated['type'],
            'options' => $validated['type'] === 'multiple_choice' ? json_encode($validated['options']) : null,
        ]);

        return redirect()->route('survey.index')->with('success', 'Survey updated successfully.');
    }

    public function destroy(Survey $survey)
    {
        $survey->delete();
        return redirect()->route('survey.index')->with('success', 'Survey deleted successfully.');
    }

    public function promeberSurvey(){
        $admin = auth()->user();
        $user = $admin->user;
        return view('survey',compact('user'));
    }

    public function promeberSurveyCate(){
        $admin = auth()->user();
        $user = $admin->user;
        return view('survey-category',compact('user'));
    }
    public function promeberCoupon(){
        $admin = auth()->user();
        $user = $admin->user;
        return view('coupon',compact('user'));
    }
}
