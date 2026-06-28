<?php

namespace App\Http\Controllers\admin;

use App\AccessTrait;
use App\FileHandlerTrait;
use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Media;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    use FileHandlerTrait, AccessTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if ($this->hasPermission()) {
            $medias = Media::all();
            return view('admin.views.list.mediaList', compact('medias'));
        } else {
            return back()->with('error', "Access denied. You are not authorized to perform this action.");
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if ($this->hasPermission()) {
            $albums = Album::get();
            $album_id = $request->query('id');
            return view('admin.views.create.addMedia', compact('albums', 'album_id'));
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
            'title' => 'required',
            'media' => 'required|file|mimes:jpeg,jpg,png,gif,webp,bmp,svg,mp4,mpeg,mp3,pdf|max:5060',
            'status' => 'required',
        ]);

        $file = $request->file('media');
        $mimeType = $file->getMimeType();

        $data = $request->only('title', 'alt', 'description', 'status', 'album_id');
        $data['type'] = $mimeType;


        if ($request->hasFile('media')) {
            $data['media'] = $this->uploadPhoto($request->file('media'), 'media');
        }
        // dd($data);
        Media::create($data);

        return back()->with('success', 'Created successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if ($this->hasPermission()) {
            $albums = Album::get();
            $media = Media::find($id);
            return view('admin.views.edit.editMedia', compact('media', 'albums'));
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
            'title' => 'nullable',
            'media' => 'sometimes|file|mimes:jpeg,jpg,png,gif,webp,bmp,svg|max:5060',
            'status' => 'sometimes',
        ]);
        $file = $request->file('media');
        $mimeType = $file->getMimeType();
        $media = Media::find($id);

        $data = [];
        if ($request->hasFile('media')) {
            $this->deletePhoto($media->media, 'media');
            $data['media'] = $this->uploadPhoto($file, 'media');
        }
        $data['type'] = $mimeType;
        $files = ['title', 'alt', 'description', 'status', 'album_id'];
        foreach ($files as $file) {
            if ($request->$file) {
                $data[$file] = $request->$file;
            }
        }
        if ($data) {
            $media->update($data);
        } else
            return back()->with('error', "Somthing Worng");

        return back()->with('success', 'Update successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if ($this->hasPermission()) {
            $media = Media::find($id);
            $this->deletePhoto($media->media, 'media');
            $media->delete();
            return back()->with('success', "Delete successfully!");
        } else {
            return back()->with('error', "Access denied. You are not authorized to perform this action.");
        }

    }
}
