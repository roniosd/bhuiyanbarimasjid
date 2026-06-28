<?php

namespace App\Http\Controllers\admin;

use App\AccessTrait;
use App\Http\Controllers\Controller;
use App\Models\Donation;
use Illuminate\Http\Request;

class DonerController extends Controller
{
    use AccessTrait;
    public function index()
    {
        if ($this->hasPermission()) {
            $donars = Donation::all();
            return view('admin.views.list.donerList', compact('donars'));
        } else {
            return back()->with('error', "Access denied. You are not authorized to perform this action.");
        }
    }
}
