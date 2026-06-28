<?php

namespace App\Http\Controllers\admin;

use App\AccessTrait;
use App\FileHandlerTrait;
use App\Http\Controllers\Controller;
use App\Models\Adminlogin;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    use FileHandlerTrait, AccessTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if ($this->hasPermission()) {
            $posts = Post::all();
            return view('admin.views.list.postList', ['posts' => $posts]);
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
            $categories = Category::whereIn('type', ['post', 'news'])->get();
            $admins = Adminlogin::get();
            
            return view('admin.views.create.addPost', ['categories' => $categories, 'admins' => $admins]);
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
            'photo' => 'image|mimes:png,jpg,jpeg,gif,bmp',
            'title' => 'required',
            'type' => 'required',
            'news_type' => 'nullable',
            'status' => 'required',
            'category_id' => 'required',
        ]);
        $data = [];
        if ($request->hasFile('photo')) {
            $data['photo'] = $this->uploadPhoto($request->file('photo'), 'post');
            ;
        }

        $files = [
            'title',
            'subtitle',
            'slug',
            'description',
            'attachment',
            'excerpt',
            'type',
            'short_description',
            'news_type',
            'status',
            'category_id',
            'tags',
            'author'
        ];
        $data['published_at'] = now();
        foreach ($files as $file) {
            if ($request->$file) {
                $data[$file] = $request->$file;
            }
        }

        if ($data) {
            $post = Post::create($data);
            $this->AdminActivity('post', $post->id, 'add');
            return back()->with('success', 'Create successfully!');
        } else {
            $this->deletePhoto($data['photo'], 'post');
            return back()->with('error', "Post Not Created successfully");
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
    public function edit(Post $post)
    {
        if ($this->hasPermission()) {
            $categories = Category::whereIn('type', ['news', 'post'])->get();
            $admins = Adminlogin::get();
            return view('admin.views.edit.editPost', ['post' => $post, 'categories' => $categories, 'admins' => $admins]);
        } else {
            return back()->with('error', "Access denied. You are not authorized to perform this action.");
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'photo' => 'image|mimes:png,jpg,jpeg,gif,bmp',
            'title' => 'required',
            'type' => 'required',
            'news_type' => 'nullable',
            'status' => 'required',
            'category_id' => 'required',
        ]);
        $data = [];
        if ($request->hasFile('photo')) {
            $this->deletePhoto($post->photo, 'post');

            $data['photo'] = $this->uploadPhoto($request->file('photo'), 'post');
        }
        $files = [
            'title',
            'subtitle',
            'slug',
            'description',
            'attachment',
            'excerpt',
            'short_description',
            'type',
            'news_type',
            'status',
            'category_id',
            'tags',
            'author'
        ];
        foreach ($files as $file) {
            if ($request->$file) {
                $data[$file] = $request->$file;
            }
        }

        if ($data && $post->update($data)) {
            $this->AdminActivity('post', $post->id, 'edit');
            return redirect()->route('post.index')->with('success', 'Update successfully!');
        } else {
            if ($request->photo) {
                $this->deletePhoto($data['photo'], 'post');
            }
            return back()->with('error', "Somthing Worng");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if ($this->hasPermission()) {
            $this->deletePhoto($post->photo, 'post');
            if ($post->delete()) {
                $this->AdminActivity('post', $post->id, 'delete');
                return back()->with('success', "Delete successfully!");
            }
        } else {
            return back()->with('error', "Access denied. You are not authorized to perform this action.");
        }
    }
}
