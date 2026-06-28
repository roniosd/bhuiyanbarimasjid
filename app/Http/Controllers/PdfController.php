<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Student;
use Mpdf\Mpdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;

class PdfController extends Controller
{


    public function show($id)
    {
        $student = Student::with('student_contact')->find($id);
        return view('pdf.admission', compact('student'));
    }

    public function membershow($id)
    {
        $member = Member::with('member_contact')->find($id);
        return view('pdf.member', compact('member'));
    }



}


