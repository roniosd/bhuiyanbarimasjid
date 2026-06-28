<?php

namespace App\Http\Controllers\admin;
;

use App\Http\Controllers\Controller;
use App\AccessTrait;
use App\Models\SessionYear;
use Illuminate\Http\Request;

class SessionYearController extends Controller
{
    use AccessTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sessions = SessionYear::get();
        return view('admin.views.create.sessionYear', compact('sessions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if ($this->hasPermission()) {
            $sessions = SessionYear::get();
            return view('admin.views.create.sessionYear', compact('sessions'));
        } else {
            return back()->with('error', "Access denied. You are not authorized to perform this action.");
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'session_name' => 'required',
            'duration' => 'nullable',
            'status' => 'required',
        ]);

        // dd($data);
        SessionYear::create($data);

        return back()->with('success', 'Created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(SessionYear $sessionYear)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $session = SessionYear::findOrFail($id);
        if ($this->hasPermission()) {
            return view('admin.views.edit.sessionYear', ['session' => $session]);
        } else {
            return back()->with('error', "Access denied. You are not authorized to perform this action.");
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $sessionYear = SessionYear::findOrFail($id);
        $data = $request->validate([
            'session_name' => 'required',
            'duration' => 'nullable',
            'status' => 'required',
        ]);

        // dd($data); 
        if ($data && $sessionYear->update($data)) {
            return redirect()->route('session.index')->with('success', 'Update successfully!');
        } else {
            return back()->with('error', "Somthing Worng");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sessionYear = SessionYear::findOrFail($id);
        if ($this->hasPermission()) {
            $sessionYear->delete();
            return back()->with('success', "Delete successfully!");
        } else {
            return back()->with('error', "Access denied. You are not authorized to perform this action.");
        }
    }
}
