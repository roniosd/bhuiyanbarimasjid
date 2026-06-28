<?php

namespace App\Http\Controllers\admin;

use App\AccessTrait;
use App\FileHandlerTrait;
use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    use AccessTrait, FileHandlerTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $student = Student::all();
        return view('admin.views.list.StudentList', compact('student'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::with('student_contact')->find($id);
        return view('admin.views.show.student', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        if ($this->hasPermission()) {
            $member = Student::with('student_contact')->find($id);

            if (!$member) {
                return back()->with('error', 'Member not found');
            }

            if (!$this->hasPermission()) {
                return back()->with('error', 'You are not authorized');
            }

            // Delete contacts and member
            $member->student_contact()->delete();
            $member->delete();


            return back()->with('success', 'Student Deleted Successfully');

        } else {
            return back()->with('error', "Access denied. You are not authorized to perform this action.");
        }


    }
}
