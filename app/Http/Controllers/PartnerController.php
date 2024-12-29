<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
class PartnerController extends Controller
{
    public function index()
    {   
        $admin = auth()->user();
        $user = $admin->user;
        $partners = Partner::all();
        return view('admin.partners', compact('user','partners'));
    }
    public function addPartner(Request $request)
    {
        $admin = auth()->user();
        $user = $admin->user;
        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required|string',
            'api_url' => 'nullable|string',
            'status' => 'required|string',
        ]);

        try {
            $partner = new Partner();

            $partner->name = $request->input('name');
            $partner->title = $request->input('title');
            $partner->description = $request->input('description');
            $partner->api_url = $request->input('api_url');
            $partner->status = $request->input('status');

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $imageName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move('images/apps', $imageName);
                $partner->image = $imageName;
            }

            $partner->save();

            return redirect()->back()->with('success', 'Partner created successfully.');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while creating the partner.');
        }
    }
    
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'image' => 'required|url',
            'description' => 'required|string',
            'api_url' => 'required|url',
            'status' => 'required|string',
        ]);
        $id = $request->input('partner_id');
        $partner = Partner::findOrFail($id);
        $partner->update($request->all());

        return redirect()->back()->with('success', 'Partner updated successfully.');
    }

    public function destroy($id)
    {
        $partner = Partner::findOrFail($id);
        $partner->delete();

        return redirect()->back()->with('success', 'Partner deleted successfully.');
    }
}
