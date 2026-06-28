<?php

namespace App\Http\Controllers\admin;

use App\AccessTrait;
use App\Http\Controllers\Controller;

use App\Models\Album;
use App\Models\Media;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    use AccessTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if ($this->hasPermission()) {
            $albums = Album::get();
            return view('admin.views.list.albumList', compact('albums'));
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
            return view('admin.views.create.addAlbum');
        } else {
            return back()->with('error', "Access denied. You are not authorized to perform this action.");
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'album_name' => 'required|string|max:255',
            'image_quality' => 'required|in:HD,normal',
            'status' => 'required',
            'slug' => 'required|unique:albums,slug',
        ]);

        if ($validated && Album::create($validated)) {

            return back()->with('success', 'Create Successfully');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Album $album)
    {
        if ($this->hasPermission()) {
            return view('admin.views.list.specifiedmediaList', compact('album'));
        } else {
            return back()->with('error', "Access denied. You are not authorized to perform this action.");
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Album $album)
    {
        if ($this->hasPermission()) {
            return view('admin.views.edit.editAlbum', compact('album'));
        } else {
            return back()->with('error', "Access denied. You are not authorized to perform this action.");
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Album $album)
    {
        $validated = $request->validate([
            'album_name' => 'required|string|max:255',
            'image_quality' => 'required|in:HD,normal',
            'status' => 'required',
            'slug' => 'required|unique:albums,slug',
        ]);

        if ($validated && $album->update($validated)) {
            return redirect()->route('album.index')->with('success', 'Update Successfully');
        } else {
            return back()->with('error', "Somthing Worng");
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Album $album)
    {
        if ($this->hasPermission()) {
            $album->delete();
            return back()->with('success', "Delete successfully!");
        } else {
            return back()->with('error', "Access denied. You are not authorized to perform this action.");
        }
    }
}
