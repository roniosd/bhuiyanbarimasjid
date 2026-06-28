<?php

namespace App\Http\Controllers\admin;

use App\AccessTrait;
use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscribersController extends Controller
{
    use AccessTrait;
    public function index()
    {
        if ($this->hasPermission()) {
            $subscribers = Subscriber::all();
            return view('admin.views.list.subscribersList', compact('subscribers'));
        } else {
            return back()->with('error', "Access denied. You are not authorized to perform this action.");
        }
    }

}
