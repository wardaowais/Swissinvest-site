<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FeedbackMember;
use App\Models\User;
use App\Models\Slider;

class FeedbackController extends Controller
{
    public function index()
    {
        $admin = auth()->user();
        $user = $admin->user;

        // Fetch feedbacks ordered by is_read (null first, then 1) and created_at descending
        $feedbacks = FeedbackMember::with('user')
            ->orderByRaw('is_read is null desc')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.admin-feedback', compact('feedbacks', 'user'));
    }

    public function updateIsRead(Request $request, $id)
    {
        $admin = auth()->user();
        $user = $admin->user;
        $feedback = FeedbackMember::with('user')->findOrFail($id);
        $feedback->is_read = true;
        $feedback->save();

        return view('admin.read-feedback', compact('feedback','user'));
    }

    public function deleteFeedback($id)
    {
        $feedback = FeedbackMember::findOrFail($id);
        $feedback->delete();
    
        return redirect()->back()->with('success', 'Feedback removed successfully');
    }
    public function userFeedback()
    {
        $admin = auth()->user();
        $user = $admin->user;
        if($user->role=='user'){
            $sliders = Slider::where('category', 'proPanel')->latest()->take(5)->get();
        }else{
            $sliders = Slider::where('category', 'companyPanel')->latest()->take(5)->get();
        }
        return view('feedback', compact('user','sliders'));
    }
    public function sendFeedback(Request $request)
    {
        $admin = auth()->user();
        $user = $admin->user;
    
        $request->validate([
            'details' => 'string|required',
            'rating' => 'required|string|in:excellent,good,poor,terrible',
            'recommend' => 'required|string|in:yes,no',
        ]);
    
        $feedback = new FeedbackMember();
        $feedback->user_id = $user->id;
        $feedback->subject = "Members Feedback";
        $feedback->details = $request->input('details');
        $feedback->rating = $request->input('rating');
        $feedback->recommend = $request->input('recommend');
        $feedback->status = 'pending'; // or any default status you prefer
        $feedback->save();
    
        return redirect()->back()->with('success', 'Feedback sent successfully');
    }
    
}
