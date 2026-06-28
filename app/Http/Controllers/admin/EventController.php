<?php
namespace App\Http\Controllers\admin;

use App\AccessTrait;
use App\FileHandlerTrait;
use App\Http\Controllers\Controller;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    use FileHandlerTrait, AccessTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if ($this->hasPermission()) {
            $events = Event::get();
            return view('admin.views.list.eventList', ['events' => $events]);
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
            return view('admin.views.create.addEvent');
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
            'photo' => 'image|max:2024|mimes:png,jpg,jpeg,gif,bmp',
            'title' => 'required',
            'end_date' => 'required',
            'start_date' => 'required',
            'status' => 'required',
            'venue' => 'required',
            'registration' => 'required',
        ]);
        $data = [];
        if ($request->hasFile('photo')) {
            $data['photo'] = $this->uploadPhoto($request->file('photo'), 'event');
        }
        $files = [
            'title',
            'slogan',
            'venue',
            'latitude',
            'longitude',
            'zoom',
            'height',
            'width',
            'city',
            'description',
            'email',
            'start_date',
            'end_date',
            'slider',
            'registration',
            'status',
            'slug',
            'short_description'
        ];

        foreach ($files as $file) {
            if ($request->$file) {
                $data[$file] = $request->$file;
            }
        }

        if ($data && $event = Event::create($data)) {
            $this->AdminActivity('event', $event->id, 'add');
            return back()->with('success', 'Create successfully!');
        } else {
            if ($request->photo) {
                $this->deletePhoto($data['photo'], 'event');
            }
            return back()->with('error', "Somthing Worng");
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        if ($this->hasPermission()) {
            return view('admin.views.edit.editEvent', ['event' => $event]);
        } else {
            return back()->with('error', "Access denied. You are not authorized to perform this action.");
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'photo' => 'image',
            'title' => 'required',
            'end_date' => 'required',
            'start_date' => 'required',
            'status' => 'required',
            'venue' => 'required',
            'registration' => 'required',
        ]);
        $data = [];
        if ($request->hasFile('photo')) {
            $this->deletePhoto($event->photo, 'event');
            $data['photo'] = $this->uploadPhoto($request->file('photo'), 'event');
        }
        $files = [
            'title',
            'slogan',
            'venue',
            'latitude',
            'longitude',
            'zoom',
            'height',
            'width',
            'city',
            'description',
            'email',
            'start_date',
            'end_date',
            'slider',
            'registration',
            'status',
            'slug',
            'short_description'
        ];

        foreach ($files as $file) {
            if ($request->$file) {
                $data[$file] = $request->$file;
            }
        }

        if ($data && $event->update($data)) {
            $this->AdminActivity('event', $event->id, 'edit');
            return redirect()->route('event.index')->with('success', 'Update successfully!');
        } else {
            if ($request->photo) {
                $this->deletePhoto($data['photo'], 'event');
            }
            return back()->with('error', "Somthing Worng");
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        if ($this->hasPermission()) {
            $this->deletePhoto($event->photo, 'event');
            if ($event->delete()) {
                $this->AdminActivity('event', $event->id, 'delete');
                return back()->with('success', "Delete successfully!");
            }
        } else {
            return back()->with('error', "Access denied. You are not authorized to perform this action.");
        }
    }
}
