<?php


namespace App\Http\Controllers\admin;

use App\AccessTrait;
use App\FileHandlerTrait;
use App\Http\Controllers\Controller;

use App\Models\Activities;
use Illuminate\Http\Request;

class ActivitiesController extends Controller
{
    use FileHandlerTrait, AccessTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if ($this->hasPermission()) {
            $activitys = Activities::all();
            return view('admin.views.list.activityList', compact('activitys'));
        } else {
            return back()->with('error', "Access denied. You are not authorized to perform this action.");
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if ($this->hasPermission()) {
            return view('admin.views.create.addActivities');
        } else {
            return back()->with('error', "Access denied. You are not authorized to perform this action.");
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'max:2024|mimes:png,jpg,jpeg,gif,bmp',
            'title' => 'required',
            'status' => 'required'
        ]);
        $data = [];
        if ($request->hasFile('photo')) {
            $data['photo'] = $this->uploadPhoto($request->file('photo'), 'activity');
        }
        $files = [
            'title',
            'description',
            'status',
            'short_description',
            'slug'
        ];

        foreach ($files as $file) {
            if ($request->$file) {
                $data[$file] = $request->$file;
            }
        }

        if ($data) {
            Activities::create($data);
        } else
            return back()->with('error', "Somthing Worng");

        return back()->with('success', 'Create successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Activities $activities)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if ($this->hasPermission()) {
            $activities = Activities::find($id);
            return view('admin.views.edit.editActivities', compact('activities'));
        } else {
            return back()->with('error', "Access denied. You are not authorized to perform this action.");
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'photo' => 'max:2024|mimes:png,jpg,jpeg,gif,bmp',
            'title' => 'required',
        ]);
        $activities = Activities::find($id);
        $data = [];
        if ($request->hasFile('photo')) {
            $this->deletePhoto($activities->photo, 'activity');
            $data['photo'] = $this->uploadPhoto($request->file('photo'), 'activity');
        }
        $files = [
            'title',
            'description',
            'status',
            'short_description',
            'slug'
        ];

        foreach ($files as $file) {
            if ($request->$file) {
                $data[$file] = $request->$file;
            }
        }

        if ($data) {
            $activities->update($data);
            return redirect()->route('allactivity.index')->with('success', 'Update successfully!');
        } else
            return back()->with('error', "Somthing Worng");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if ($this->hasPermission()) {
            $activities = Activities::find($id);
            $this->deletePhoto($activities->photo, 'fund');
            $activities->delete();
            return back()->with('success', "Delete successfully!");
        } else {
            return back()->with('error', "Access denied. You are not authorized to perform this action.");
        }
    }
}
