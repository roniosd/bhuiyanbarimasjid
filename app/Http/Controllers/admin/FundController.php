<?php

namespace App\Http\Controllers\admin;

use App\AccessTrait;
use App\Http\Controllers\Controller;
use App\FileHandlerTrait;
use App\Models\Fund;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;

class FundController extends Controller
{
    use FileHandlerTrait, AccessTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if ($this->hasPermission()) {
            $funds = Fund::paginate(10);
            return view('admin.views.list.fundList', compact('funds'));
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
            return view('admin.views.create.addFund');
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
            'featured_photo' => 'max:2024|mimes:png,jpg,jpeg,gif,bmp',
            'title' => 'required',
            'slug' => 'required',
            'status' => 'required',
        ]);
        $data = [];
        $uploadedFile = $request->file('featured_photo');

        if ($request->hasFile('featured_photo')) {
            $data['featured_photo'] = $this->uploadPhoto($uploadedFile, 'fund');
        }
        $files = [
            'title',
            'description',
            'show_membership',
            'donation_info',
            'show_payment_method',
            'donation_unit',
            'status',
            'slug'
        ];

        foreach ($files as $file) {
            if ($request->$file || $request->$file == '0') {
                $data[$file] = $request->$file;
            }
        }

        if ($data && $fund = Fund::create($data)) {
            $this->AdminActivity('fund', $fund->id, 'add');
            return back()->with('success', 'Create successfully!');
        } else {
            if ($request->photo) {
                $this->deletePhoto($data['featured_photo'], 'fund');
            }
            return back()->with('error', "Somthing Worng");
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Fund $fund)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fund $fund)
    {
        if ($this->hasPermission()) {
            return view('admin.views.edit.editFund', compact('fund'));
        } else {
            return back()->with('error', "Access denied. You are not authorized to perform this action.");
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fund $fund)
    {
        $request->validate([
            'featured_photo' => 'max:2024|mimes:png,jpg,jpeg,gif,bmpmimes:png,jpg,jpeg,gif,bmp',
            'title' => 'required',
        ]);
        $data = [];
        if ($request->hasFile('featured_photo')) {
            $this->deletePhoto($fund->featured_photo, 'fund');
            $data['featured_photo'] = $this->uploadPhoto($request->file('featured_photo'), 'fund');
        }
        $files = [
            'title',
            'description',
            'show_membership',
            'donation_info',
            'show_payment_method',
            'donation_unit',
            'status',
            'slug'
        ];

        foreach ($files as $file) {
            if ($request->$file || $request->$file == '0') {
                $data[$file] = $request->$file;
            }
        }

        if ($data && $fund->update($data)) {
            $this->AdminActivity('fund', $fund->id, 'edit');
            return redirect()->route('fund.index')->with('success', 'Update successfully!');
        } else {
            if ($request->photo) {
                $this->deletePhoto($data['featured_photo'], 'fund');
            }
            return back()->with('error', "Somthing Worng");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fund $fund)
    {
        if ($this->hasPermission()) {
            $this->deletePhoto($fund->photo, 'fund');

            if ($fund->delete()) {
                $this->AdminActivity('fund', $fund->id, 'delete');
                return back()->with('success', "Delete successfully!");
            }
        } else {
            return back()->with('error', "Access denied. You are not authorized to perform this action.");
        }
    }
}
