<?php

namespace App\Http\Controllers\admin;

use App\AccessTrait;
use App\FileHandlerTrait;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SliderController extends Controller
{
    use FileHandlerTrait, AccessTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if ($this->hasPermission()) {
            $sliders = Slider::get();
            return view('admin.views.list.sliderList', compact('sliders'));
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
            $categoris = Category::where([['type', 'graphics'], ['status', 'published']])->get();
            return view('admin.views.create.addSlider', compact('categoris'));
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
            'photo' => 'image|required|mimes:png,jpg,jpeg,gif,bmp',
            'category' => 'required',
            'position' => 'required',
            'status' => 'required',
        ]);
        $data = [];

        if ($request->hasFile('photo')) {
            $data['photo'] = $this->uploadPhoto($request->file('photo'), 'slider');
        }
        $files = [
            'title',
            'position',
            'btn_label',
            'btn_link',
            'category',
            'status',
            'description',
        ];
        foreach ($files as $file)
            $data[$file] = $request->$file;

        if ($data) {
            $slider = Slider::create($data);
            $this->AdminActivity('slider', $slider->id, 'add');
            return back()->with('success', 'Slider Create successfully!');
        } else {
            if ($request->photo) {
                $this->deletePhoto($data['photo'], 'slider');
            }
            return back()->with('error', "Somthing Worng");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        if ($this->hasPermission()) {
            $categoris = Category::get();
            return view('admin.views.edit.editSlider', compact('slider', 'categoris'));
        } else {
            return back()->with('error', "Access denied. You are not authorized to perform this action.");
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'photo' => 'image|max:2024|mimes:png,jpg,jpeg,gif,bmp',
            'position' => 'nullable',
        ]);

        $data = [];

        if ($request->hasFile('photo')) {
            $this->deletePhoto($slider->photo, 'slider');
            $data['photo'] = $this->uploadPhoto($request->file('photo'), 'slider');
        }

        $fields = ['title', 'position', 'btn_label', 'btn_link', 'category', 'status', 'description'];

        foreach ($fields as $field) {
            if ($request->$field) {
                $data[$field] = $request->$field;
            }
        }

        if ($data && $slider->update($data)) {
            $this->AdminActivity('slider', $slider->id, 'edit');
            return redirect()->route('slider.index')->with('success', 'Update successfully!');
        } else {
            if ($request->photo) {
                $this->deletePhoto($data['photo'], 'slider');
            }
            return back()->with('error', 'Slider Not Updated Not Successfully');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Slider $slider)
    {
        if ($this->hasPermission()) {
            $this->deletePhoto($slider->photo, 'slider');
            $slider->delete();
            $this->AdminActivity('slider', $slider->id, 'delete');
            return back()->with('success', "Delete successfully!");
        } else {
            return back()->with('error', "Access denied. You are not authorized to perform this action.");
        }
    }
}
