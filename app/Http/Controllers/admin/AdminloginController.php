<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Adminlogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminloginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            $admin = Adminlogin::where('email', $request->email)->first();

            if ($admin) {
                $admin->update(['last_login' => now()]);
                
            }
            return redirect()->route('dashboard')->with('success', 'Login Successful');
        }

        return back()->with('error', 'Login failed. Please verify your email and password.');
    }

}
