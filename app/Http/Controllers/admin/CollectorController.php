<?php

namespace App\Http\Controllers\admin;

use App\AccessTrait;
use App\FileHandlerTrait;
use App\Models\Collector;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CollectorController extends Controller
{
    use AccessTrait, FileHandlerTrait;

    protected function Validation($request)
    {
        return $request->validate([
            'name' => 'required|string|max:120',

            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'mobile_number' => [
                'required',
                'string',
                'max:20',
                'regex:/^(?:\+8801|01)[3-9]\d{8}$/',
            ],

            'nid' => 'required|string|min:10|max:20',

            'appointed_by' => 'nullable|string|max:120',
        ]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $collectors = Collector::get();
        return view('admin.views.list.collector', compact('collectors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if ($this->hasPermission()) {

            return view('admin.views.create.collector');
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
            $data['photo'] = $this->uploadPhoto($request->file('photo'), 'collector');
        }
        // dd($data);
        Collector::create($data);

        return back()->with('success', 'Created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Collector $collector)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $collector = Collector::findOrFail($id);

        if ($this->hasPermission()) {
            return view('admin.views.edit.collector', ['collector' => $collector]);
        } else {
            return back()->with('error', "Access denied. You are not authorized to perform this action.");
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $collector = Collector::findOrFail($id);
        $data = $this->Validation($request);

        if ($request->hasFile("photo")) {
            $this->deletePhoto($collector->photo, 'collector');
            $data['photo'] = $this->uploadPhoto($request->file('photo'), 'collector');
        }

        // dd($data); 
        if ($data && $collector->update($data)) {
            return redirect()->route('collector.index')->with('success', 'Update successfully!');
        } else {
            return back()->with('error', "Somthing Worng");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $collector = Collector::findOrFail($id);
        if ($this->hasPermission()) {
            $this->deletePhoto($collector->photo, 'collector');
            $collector->delete();
            return back()->with('success', "Delete successfully!");
        } else {
            return back()->with('error', "Access denied. You are not authorized to perform this action.");
        }
    }
}
