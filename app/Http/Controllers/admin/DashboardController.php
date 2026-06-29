<?php

namespace App\Http\Controllers\admin;

use App\Models\Donation;
use App\Models\Event;
use App\Models\Feedback;
use App\Models\Member;
use App\Models\Post;
use App\Models\Student;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::guard('admin')->check()) {
            $totalDonation = Donation::sum('amount');
            $recentDonations = Donation::with('fund')->latest('transaction_time')->take(5)->get();
            $upcomingEvents = Event::whereDate('start_date', '>=', now())->orderBy('start_date')->take(5)->get();
            $latestPosts = Post::latest()->take(5)->get();

            return view('admin.views.adminDashboard', [
                'totalDonation' => $totalDonation,
                'totalMembers' => Member::count(),
                'totalStudents' => Student::count(),
                'pendingFeedback' => Feedback::whereNull('replied_at')->count(),
                'recentDonations' => $recentDonations,
                'upcomingEvents' => $upcomingEvents,
                'latestPosts' => $latestPosts,
            ]);
        }

        return view('admin.auth.adminLogin'); 
    }
}
