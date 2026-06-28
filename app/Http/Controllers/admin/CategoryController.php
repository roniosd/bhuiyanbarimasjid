<?php

namespace App\Http\Controllers\admin;

use App\AccessTrait;
use App\FileHandlerTrait;
use App\Http\Controllers\Controller;
use App\Models\Category as ModelsCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use FileHandlerTrait, AccessTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if ($this->hasPermission()) {
            $catagoris = ModelsCategory::get();
            return view('admin.views.list.categoryList', ['categoris' => $catagoris]);
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
            return view('admin.views.create.addCategory', ['category' => '']);
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
            'name' => 'required',
            'slug' => 'required',
            'type' => 'required',
            'status' => 'required',
            'is_parent' => 'required',
        ]);
        $data = [];
        if ($request->hasFile('photo')) {
            $data['photo'] = $this->uploadPhoto($request->file('photo'), 'category');
        }
        $files = [
            'name',
            'slug',
            'description',
            'status',
            'type',
            'is_parent'
        ];
        foreach ($files as $file) {
            if ($request->$file) {
                $data[$file] = $request->$file;
            }
        }

        if ($data && ModelsCategory::create($data)) {
            return back()->with('success', 'Create successfully!');
        } else {
            if ($request->photo) {
                $this->deletePhoto($data['photo'], 'category');
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
    public function edit(ModelsCategory $category)
    {
        if ($this->hasPermission()) {
            return view('admin.views.edit.editCategory', ['category' => $category]);
        } else {
            return back()->with('error', "Access denied. You are not authorized to perform this action.");
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ModelsCategory $category)
    {
        $request->validate([
            'photo' => 'image|max:2024|mimes:png,jpg,jpeg,gif,bmp',
            'name' => 'required',
            'slug' => 'required',
        ]);
        $data = [];
        if ($request->hasFile("photo")) {
            $this->deletePhoto($category->photo, 'category');
            $data['photo'] = $this->uploadPhoto($request->file('photo'), 'category');
        }
        $files = [
            'name',
            'slug',
            'description',
            'status',
            'type',
            'is_parent'
        ];
        foreach ($files as $file) {
            if ($request->$file) {
                $data[$file] = $request->$file;
            }
        }

        if ($data && $category->update($data)) {
            return redirect()->route('category.index')->with('success', 'Update successfully!');
        } else {
            return back()->with('error', "Somthing Worng");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ModelsCategory $category)
    {
        if ($this->hasPermission()) {
            $this->deletePhoto($category->photo, 'category');
            $category->delete();
            return back()->with('success', "Delete successfully!");
        } else {
            return back()->with('error', "Access denied. You are not authorized to perform this action.");
        }
    }
}
