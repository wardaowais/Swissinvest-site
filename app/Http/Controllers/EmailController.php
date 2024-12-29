<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
class EmailController extends Controller
{
    public function showForm()
    {
        $users = User::all();
        return view('admin.send-email', compact('users'));
    }

    public function sendEmail(Request $request)
    {
        $request->validate([
            'emails' => 'required|array',
            'emails.*' => 'email',
            'subject' => 'required|string|max:255',
            // 'body' => 'required|string',
        ]);
    
        $emails = $request->input('emails');
        $subject = $request->input('subject');
    
        foreach ($emails as $email) {
            // Check if the email exists in the admins table
            $admin = Admin::where('email', $email)->first();
    
            // If the email does not exist in the admins table, create a new admin record
            if (!$admin) {
                // Get the user associated with the email
                $user = User::where('email', $email)->first();
                if ($user) {
                    // Create a new admin record
                    Admin::create([
                        'user_id' => $user->id,
                        'email' => $email,
                        'password' => Hash::make('741852741'),
                        'role' => 'user',
                        'is_verified' => 1,
                    ]);
                } else {
                    // If no user is found, you can decide how to handle this case.
                    // For example, you might want to skip this email or log an error.
                    continue;
                }
            }
    
            // Send the email
            $user = User::where('email', $email)->first();
            $data = [
                'name' => $user->first_name,
                'email' => $user->email,
                'default_password'=>741852741,
                'url' => 'https://doctors.allomed.ch/login',
            ];
    
            Mail::send('emails.email-template', $data, function ($message) use ($email, $subject) {
                $message->to($email)
                        ->subject($subject);
            });
        }
    
        return redirect()->back()->with('success', 'Emails sent successfully!');
    }
}
