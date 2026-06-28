<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Mail\NewPasswordMail;
use App\Models\Adminlogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    public function showForm()
    {
        return view('admin.auth.forgotPassword');
    }

    public function sendNewPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:adminlogins,email',
        ]);

        $admin = Adminlogin::where('email', $request->email)->first();



        $newPassword = Str::random(8);
        $admin->password = Hash::make($newPassword);
        $admin->save();
        $mailData = [
            'new_password' => $newPassword,
        ];
        

        try {
            Mail::to($admin->email)->send(new NewPasswordMail($mailData));
            
            return to_route('login')->with('success', 'নতুন পাসওয়ার্ড ইমেইলে পাঠানো হয়েছে।');
        } catch (\Exception $e) {
            return back()->with('error', 'ইমেইল পাঠাতে ব্যর্থ: ' . $e->getMessage());
        }
    }
}
