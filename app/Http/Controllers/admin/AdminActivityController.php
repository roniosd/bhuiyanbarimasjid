<?php

namespace App\Http\Controllers\admin;

use App\AccessTrait;
use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use Illuminate\Http\Request;

class AdminActivityController extends Controller
{
    use AccessTrait;
    public function index()
    {
        if ($this->hasPermission()) {
            $activity_logs = ActivityLog::orderByDesc('id')->get();
            return view('admin.views.activity_log', compact('activity_logs'));
        } else {
            return back()->with('error', "Access denied. You are not authorized to perform this action.");
        }
    }
}
