<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\TimeSlot;
use Illuminate\Http\Request;

class TimeSlotController extends Controller

{
    public function index()
    {
        $admin = auth()->user();
        $user = $admin->user;

        // Fetch time slots for the authenticated user
        $timeSlots = TimeSlot::where('user_id', $user->id)
            ->select('id', 'from_time', 'to_time', 'date')
            ->get()
            ->map(function ($slot) {
                return [
                    'id' => $slot->id,
                    'title' => 'Booked',
                    'start' => $slot->date . 'T' . $slot->from_time,
                    'end' => $slot->date . 'T' . $slot->to_time,
                ];
            });

        return response()->json($timeSlots);
    }

   
    public function storeTimeSlot(Request $request)
    {
    $validatedData = $request->validate([
        'start_datetime' => 'required|date',
        'end_datetime' => 'required|date|after:start_datetime',
    ]);

    $admin = auth()->user();
    $user = $admin->user;


    $startDate = date('Y-m-d', strtotime($validatedData['start_datetime']));
    $startTime = date('H:i:s', strtotime($validatedData['start_datetime']));
    $endTime = date('H:i:s', strtotime($validatedData['end_datetime']));

    $existingSlot = TimeSlot::where('user_id', $user->id)
                            ->where('date', $startDate)
                            ->where('from_time', $startTime)
                            ->where('to_time', $endTime)
                            ->exists();

    if ($existingSlot) {
        return response()->json(['message' => 'Time slot already selected.'], 422);
    }
    if ($user->is_active != 1) {
        $user->is_active = 1;
        $user->save();
    }
    $timeSlot = new TimeSlot();
    $timeSlot->user_id = $user->id;
    $timeSlot->date = $startDate;
    $timeSlot->from_time = $startTime;
    $timeSlot->to_time = $endTime;
 
    $timeSlot->duration = ''; 

    $timeSlot->save();

    return response()->json(['message' => 'Time slot saved successfully.']);
}


public function getGroupUserTimeSlots($id)
    {
        $timeSlots = TimeSlot::where('user_id', $id)->get();
        $events = [];

        foreach ($timeSlots as $slot) {
            $events[] = [
                'title' => 'Booked',
                'start' => $slot->date . 'T' . $slot->from_time,
                'end' => $slot->date . 'T' . $slot->to_time,
                'allDay' => false,
            ];
        }

        return response()->json($events);
    }

    public function storeGroupUserTimeSlot(Request $request, $id)
    {
        $validatedData = $request->validate([
            'start_datetime' => 'required|date',
            'end_datetime' => 'required|date|after:start_datetime',
        ]);

        $startDate = date('Y-m-d', strtotime($validatedData['start_datetime']));
        $startTime = date('H:i:s', strtotime($validatedData['start_datetime']));
        $endTime = date('H:i:s', strtotime($validatedData['end_datetime']));

        // Check if the time slot already exists
        $existingSlot = TimeSlot::where('user_id', $id)
                                ->where('date', $startDate)
                                ->where('from_time', $startTime)
                                ->where('to_time', $endTime)
                                ->exists();

        if ($existingSlot) {
            return response()->json(['message' => 'Time slot already selected.'], 422);
        }
        $user = User::find($id);
        if ($user->is_active != 1) {
            $user->is_active = 1;
            $user->save();
        }
        // Save the new time slot
        $timeSlot = new TimeSlot();
        $timeSlot->user_id = $id;
        $timeSlot->date = $startDate;
        $timeSlot->from_time = $startTime;
        $timeSlot->to_time = $endTime;
        $timeSlot->duration = ''; // Add logic to calculate duration if needed
        $timeSlot->save();

        return response()->json(['message' => 'Time slot saved successfully.']);
    }
}
