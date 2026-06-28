<?php

namespace App\Http\Controllers\admin;
;

use App\AccessTrait;
use App\FileHandlerTrait;
use App\Http\Controllers\Controller;

use App\Models\Committee;
use App\Models\SessionYear;
use Illuminate\Http\Request;

class CommitteeController extends Controller
{
    use AccessTrait, FileHandlerTrait;

    protected function Validation($request)
    {
        return $request->validate([
            'session_id' => 'required|exists:session_years,id',

            'designation' => 'required|string|max:100',
            'name' => 'required|string|max:120',

            'mobile_number' => [
                'nullable',
                'string',
                'max:20',
                'regex:/^(?:\+8801|01)[3-9]\d{8}$/',
            ],

            'email' => 'nullable|email|max:150',

            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'membership_fee' => 'nullable|numeric|min:0|max:9999999.99',

            'status' => 'required|in:published,unpublished',
        ]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $committees = Committee::get();
        return view('admin.views.list.committee', compact('committees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if ($this->hasPermission()) {
            $sessions = SessionYear::get();

            return view('admin.views.create.committee', compact('sessions'));
        } else {
            return back()->with('error', "Access denied. You are not authorized to perform this action.");
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $this->Validation($request);

        if ($request->hasFile('photo')) {
            $data['photo'] = $this->uploadPhoto($request->file('photo'), 'committee');
        }
        // dd($data);
        Committee::create($data);

        return back()->with('success', 'Created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Committee $committee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $committee = Committee::findOrFail($id);
        $sessions = SessionYear::get();

        if ($this->hasPermission()) {
            return view('admin.views.edit.committee', ['committee' => $committee, 'sessions' => $sessions]);
        } else {
            return back()->with('error', "Access denied. You are not authorized to perform this action.");
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $committee = Committee::findOrFail($id);
        $data = $this->Validation($request);

        if ($request->hasFile("photo")) {
            $this->deletePhoto($committee->photo, 'committee');
            $data['photo'] = $this->uploadPhoto($request->file('photo'), 'committee');
        }

        // dd($data); 
        if ($data && $committee->update($data)) {
            return redirect()->route('committee.index')->with('success', 'Update successfully!');
        } else {
            return back()->with('error', "Somthing Worng");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $committee = Committee::findOrFail($id);
        if ($this->hasPermission()) {
            $this->deletePhoto($committee->photo, 'committee');
            $committee->delete();
            return back()->with('success', "Delete successfully!");
        } else {
            return back()->with('error', "Access denied. You are not authorized to perform this action.");
        }
    }
}
