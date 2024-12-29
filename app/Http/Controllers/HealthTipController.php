<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\HealthTip;
use App\Models\HealthTipDetail;

class HealthTipController extends Controller
{
    public function index()
    {
        $healthTips = HealthTip::with('healthTipDetails')->where('status', 'active')->get();
        return view('admin.health-tips.index', compact('healthTips'));
    }
    public function create()
    {
        $healthTips = HealthTip::all();
        return view('admin.health-tips.create', compact('healthTips'));
    }

    public function store(Request $request)
{
    // Validate inputs
    $request->validate([
        'tips_header' => 'required|string|max:255',
        'tips_footer' => 'nullable|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'tips' => 'required|array',
        'tips.*' => 'required|string'
    ]);

    // Store image if it exists
    $imageName = null;
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $imageName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('images/tips'), $imageName); // Store in 'images/tips' folder
    }

    // Create HealthTip record
    $healthTip = HealthTip::create([
        'tips_header' => $request->tips_header,
        'tips_footer' => $request->tips_footer,
        'image' => $imageName, // Save the image file name
        'status' => 'active', // Assuming 'active' status by default
    ]);

    // Save each tip into HealthTipDetail with foreign key of HealthTip
    foreach ($request->tips as $tip) {
        HealthTipDetail::create([
            'tips_id' => $healthTip->id,
            'tips' => $tip,
            'status' => 'active', // Assuming 'active' status by default
        ]);
    }

    return redirect()->route('health_tip_details.index')->with('success', 'Health Tip created successfully.');
}
public function edit($id)
{
    $healthTip = HealthTip::with('healthTipDetails')->findOrFail($id);
    return view('admin.health-tips.edit', compact('healthTip'));
}

// Function to handle the update request
public function update(Request $request, $id)
{
    // Validate input
    $request->validate([
        'tips_header' => 'required|string|max:255',
        'tips_footer' => 'nullable|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'tips' => 'required|array',
        'tips.*' => 'required|string',
    ]);

    // Find the health tip
    $healthTip = HealthTip::findOrFail($id);

    // Update header and footer
    $healthTip->tips_header = $request->input('tips_header');
    $healthTip->tips_footer = $request->input('tips_footer');
    $healthTip->status = $request->input('status', 'active'); // Set to 'active' by default if not provided

    // Handle the image upload if a new image is provided
    if ($request->hasFile('image')) {
        // Remove the old image if exists
        if ($healthTip->image && File::exists(public_path('images/tips/' . $healthTip->image))) {
            File::delete(public_path('images/tips/' . $healthTip->image));
        }

        // Store the new image
        $file = $request->file('image');
        $imageName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('images/tips'), $imageName);
        $healthTip->image = $imageName;
    }

    // Save the updated health tip
    $healthTip->save();

    // Update or insert tips
    HealthTipDetail::where('tips_id', $healthTip->id)->delete(); // Remove old tips

    foreach ($request->input('tips') as $tip) {
        HealthTipDetail::create([
            'tips_id' => $healthTip->id,
            'tips' => $tip,
            'status' => '1', // Default to active
        ]);
    }

    return redirect()->route('health_tip_details.index')->with('success', 'Health Tip updated successfully.');
}

public function showHealthTips()
{
    // Retrieve the latest 3 active health tips with their details
    $healthTips = HealthTip::with('healthTipDetails')
        ->where('status', 'active')
        ->latest() // Orders by the 'created_at' timestamp by default
        ->take(3) // Limits the result to 3 records
        ->get();

    // Return the view with the health tips data
    return view('patient.health-tips', compact('healthTips'));
}

public function healthTipsDetails()
{

    // Return the view with the health tips data
    return view('patient.health-tips-details');
}
public function telemedicineDetails()
{

    // Return the view with the health tips data
    return view('patient.telemedicine-details');
}
public function showtelemedicine(){

    return view('patient.telemedicine');
}
public function showPhoneConsultaion(){
    
    return view('patient.phone-consultaion');
}
public function showPhoneConsultaionDetails(){
    
    return view('patient.phone-consultaion-details');
}

}
