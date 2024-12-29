<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MemberEvent;
use App\Models\EventSlider;
use App\Models\Specialty;
use App\Models\MemberTitle;
use App\Models\User;
class MemberEventController extends Controller
{
 
    public function memberEventAdmin(){
        $admin = auth()->user();
        $user = $admin->user;
        $specialities = Specialty::all();
        $titles = MemberTitle::all();
        return view('admin.admin-events',compact('user','specialities','titles'));

    }

    public function addEvents(Request $request)
    {
        $request->validate([
            'specialities_id' => 'required|exists:specialties,id',
            'ttile_id' => 'required|exists:member_titles,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'event_url' => 'required|url',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // dd($request->input('specialities_id'));

        $event = MemberEvent::create($request->all());

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $imageName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move('images/events', $imageName);

                EventSlider::create([
                    'event_id' => $event->id,
                    'image' => 'images/events/' . $imageName,
                    'status' => 1
                ]);
            }
        }

        return redirect()->back()->with('success', 'Event created successfully.');
    }

    public function memberEventAdminList(){
        $admin = auth()->user();
        $user = $admin->user;
        $events = MemberEvent::all();
        $specialities = Specialty::all();
        $titles = MemberTitle::all();
        $events = MemberEvent::orderBy('created_at', 'desc')->get();

        return view('admin.admin-event-list',compact('user','specialities','titles','events'));

    }
    public function deleteEvent($id)
    {
        $feedback = MemberEvent::findOrFail($id);
        $feedback->delete();
    
        return redirect()->back()->with('success', 'Event removed successfully');
    }

    public function memberEvent(Request $request) {
        $admin = auth()->user();
        $user = $admin->user;
        $specialities = Specialty::all();
        $titles = MemberTitle::all();
    
        $query = MemberEvent::query();
    
        if ($request->filled('specialty_id')) {
            $query->where('specialty_id', $request->input('specialty_id'));
        }
    
        if ($request->filled('title_id')) {
            $query->where('ttile_id', $request->input('title_id'));
        }
    
        if ($request->filled('event_date')) {
            $query->whereDate('created_at', $request->input('event_date'));
        }
    
        $events = $query->orderBy('created_at', 'desc')->get();
    
        return view('member-events', compact('user', 'specialities', 'titles', 'events'));
    }
    
}
