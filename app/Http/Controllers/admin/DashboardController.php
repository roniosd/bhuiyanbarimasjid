<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::guard('admin')->check()) {
            return view('admin.views.adminDashboard');
        }

        return view('admin.auth.adminLogin'); // ← This line IS executed
    }
}
