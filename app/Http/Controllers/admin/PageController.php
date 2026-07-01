<?php

namespace App\Http\Controllers\admin;

use App\AccessTrait;
use App\Http\Controllers\Controller;
use App\FileHandlerTrait;
use App\Models\Page;
use App\Models\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    use FileHandlerTrait, AccessTrait;

    //! Display a listing of the resource.

    public function index()
    {
        if ($this->hasPermission()) {
            $pages = Page::get();
            return view('admin.views.list.pageList', ['pages' => $pages]);
        } else {
            return back()->with('error', "Access denied. You are not authorized to perform this action.");
        }
    }


    //! Show the form for creating a new resource.

    public function create()
    {
        if ($this->hasPermission()) {
            $templates = $this->templates();
            $posts = Post::get();
            return view('admin.views.create.addPage', compact('templates', 'posts'));
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
            'photo' => 'image',
            'title' => 'required',
            'member_type' => 'nullable',
            'slug' => 'required|unique:pages,slug',
            'status' => 'required',
        ]);
        $data = [];
        if ($request->hasFile('photo')) {
            $data['photo'] = $this->uploadPhoto($request->file('photo'), 'page');
        }
        $files = [
            'title',
            'slug',
            'type',
            'description',
            'excerpt',
            'status',
            'post_id',
            'template',
            'widget'
        ];
        foreach ($files as $file) {
            if ($request->$file) {
                $data[$file] = $request->$file;
            }
        }
        $data['published_at'] = now();
        if ($data && $page = Page::create($data)) {
            $this->AdminActivity('page', $page->id, 'add');

            return back()->with('success', 'Create successfully!');
        } else {
            if ($request->photo) {
                $this->deletePhoto($data['photo'], 'page');
            }
            return back()->with('error', "Somthing Worng");
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Page $page)
    {
        if ($this->hasPermission()) {
            $posts = Post::get();
            $templates = $this->templates();

            return view('admin.views.edit.editPage', ['page' => $page, 'posts' => $posts, 'templates' => $templates]);
        } else {
            return back()->with('error', "Access denied. You are not authorized to perform this action.");
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Page $page)
    {
        $request->validate([
            'photo' => 'image|max:2024|mimes:png,jpg,jpeg,gif,bmp',
            'title' => 'required',
            'member_type' => 'nullable',
            'slug' => 'required|unique:pages,slug,' . $page->id,
            'status' => 'required',
        ]);
        $data = [];
        if ($request->hasFile('photo')) {
            $this->deletePhoto($page->photo, 'page');

            $data['photo'] = $this->uploadPhoto($request->file('photo'), 'page');
        }
        $files = [
            'title',
            'slug',
            'description',
            'excerpt',
            'status',
            'post_id',
            'type',
            'template',
            'widget'
        ];
        foreach ($files as $file) {
            if ($request->$file) {
                $data[$file] = $request->$file;
            }
        }
        if ($data && $page->update($data)) {
            $this->AdminActivity('page', $page->id, 'edit');
            return redirect()->route('page.index')->with('success', 'Update successfully!');
        } else {
            if ($request->photo) {
                $this->deletePhoto($data['photo'], 'page');
            }
            return back()->with('error', "Somthing Worng");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Page $page)
    {
        if ($this->hasPermission()) {
            $this->deletePhoto($page->photo, 'page');

            if ($page->delete()) {
                $this->AdminActivity('page', $page->id, 'delete');
                return back()->with('success', "Delete successfully!");
            }
        } else {
            return back()->with('error', "Access denied. You are not authorized to perform this action.");
        }
    }
}
