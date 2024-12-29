<?php

namespace App\Http\Controllers;

use App\Models\MemberTitle;
use App\Models\User;
use Illuminate\Http\Request;

class MemberTitleController extends Controller
{
    public function index()
    {
        $admin = auth()->user();
        $user = $admin->user;
        $titles = MemberTitle::all();
        return view('admin.member_titles', compact('titles','user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        MemberTitle::create($request->all());

        return redirect()->route('member-titles.index')->with('success', 'Member title created successfully.');
    }

    public function edit($id)
    {
        $title = MemberTitle::findOrFail($id);
        return view('member_titles', compact('title'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $title = MemberTitle::findOrFail($id);
        $title->update($request->all());

        return redirect()->route('member-titles.index')->with('success', 'Member title updated successfully.');
    }

    public function destroy($id)
    {
        MemberTitle::findOrFail($id)->delete();
        return redirect()->route('member-titles.index')->with('success', 'Member title deleted successfully.');
    }
}
