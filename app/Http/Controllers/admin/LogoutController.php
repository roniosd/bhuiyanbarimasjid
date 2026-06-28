<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LogoutController extends Controller
{
    public function index()
    {
        Auth::guard('admin')->logout();
        session()->flush();
        return Redirect::route('dashboard')->with('success', 'Logged out successfully.');
    }
}
