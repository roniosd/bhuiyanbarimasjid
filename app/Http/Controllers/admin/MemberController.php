<?php

namespace App\Http\Controllers\admin;

use App\AccessTrait;
use App\FileHandlerTrait;
use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    use AccessTrait, FileHandlerTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = Member::all();
        return view('admin.views.list.memberList', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(string $id)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $member = Member::with('member_contact')->find($id);
        return view('admin.views.show.member', compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (!$this->hasPermission()) {
            return back()->with('error', 'Access denied. You are not authorized to perform this action.');
        }

        $member = Member::with(['permanentAddress', 'presentAddress'])->findOrFail($id);

        return view('admin.views.edit.member', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (!$this->hasPermission()) {
            return back()->with('error', 'Access denied. You are not authorized to perform this action.');
        }

        $member = Member::with(['permanentAddress', 'presentAddress'])->findOrFail($id);

        $validatedMember = $request->validate([
            'full_name' => 'required|string|max:200',
            'father' => 'required|string|max:200',
            'mother' => 'required|string|max:200',
            'dob' => 'required|date',
            'mobile' => 'required|string|max:20',
            'email' => 'nullable|email|max:200',
            'occupation' => 'nullable|string|max:200',
            'workspace' => 'nullable|string|max:200',
            'education' => 'nullable|string|max:200',
            'note' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status' => 'required|in:active,inactive',
            'member_type' => 'required|in:general,premium,vip,social',
        ]);

        $validatedContact = $request->validate([
            'village' => 'required|string|max:200',
            'post' => 'required|string|max:200',
            'subdistrict' => 'required|string|max:200',
            'district' => 'required|string|max:200',
            'preVillage' => 'nullable|string|max:200',
            'prePost' => 'nullable|string|max:200',
            'preSubdistrict' => 'nullable|string|max:200',
            'preDistrict' => 'nullable|string|max:200',
        ]);

        $oldPhoto = $member->photo;
        $newPhoto = null;

        if ($request->hasFile('photo')) {
            $newPhoto = $this->uploadPhoto($request->file('photo'), 'member');
            $validatedMember['photo'] = $newPhoto;
        }

        try {
            DB::transaction(function () use ($member, $validatedMember, $validatedContact) {
                $member->update($validatedMember);

                $member->member_contact()->updateOrCreate(
                    ['type' => 'permanent'],
                    [
                        'village' => $validatedContact['village'],
                        'post' => $validatedContact['post'],
                        'subdistrict' => $validatedContact['subdistrict'],
                        'district' => $validatedContact['district'],
                    ]
                );

                $member->member_contact()->updateOrCreate(
                    ['type' => 'present'],
                    [
                        'village' => $validatedContact['preVillage'] ?? null,
                        'post' => $validatedContact['prePost'] ?? null,
                        'subdistrict' => $validatedContact['preSubdistrict'] ?? null,
                        'district' => $validatedContact['preDistrict'] ?? null,
                    ]
                );
            });
        } catch (\Throwable $exception) {
            if ($newPhoto) {
                $this->deletePhoto($newPhoto, 'member');
            }

            report($exception);

            return back()->withInput()->with('error', 'Member update failed. Please try again.');
        }

        if ($newPhoto && $oldPhoto) {
            $this->deletePhoto($oldPhoto, 'member');
        }

        $this->AdminActivity('member', $member->id, 'edit');

        return redirect()->route('member.index')->with('success', 'Member updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        if ($this->hasPermission()) {
            $member = Member::find($id);

            if (!$member) {
                return back()->with('error', 'Member not found');
            }

            if (!$this->hasPermission()) {
                return back()->with('error', 'You are not authorized');
            }

            // Delete contacts and member
            $member->member_contact()->delete();
            $member->delete();


            return back()->with('success', 'Member Deleted Successfully');

        } else {
            return back()->with('error', "Access denied. You are not authorized to perform this action.");
        }


    }
}
