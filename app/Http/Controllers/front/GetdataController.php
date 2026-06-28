<?php

namespace App\Http\Controllers\front;

use App\FileHandlerTrait;
use App\Http\Controllers\Controller;
use App\Models\Donation;
use App\Models\Feedback;
use App\Models\Member;
use App\Models\MemberContact;
use App\Models\Student;
use App\Models\StudentContact;
use App\Models\Subscriber;
use App\Services\SmsService;
use Illuminate\Http\Request;

class GetdataController extends Controller
{
    use FileHandlerTrait;
    public function storeDonation(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'contact' => 'required|string',
            'fund_id' => 'required|exists:funds,id',
        ]);

        $timeZone = now()->timezone->getName();

        $donation = Donation::create([
            'fund_id' => $request->fund_id,
            'donar' => $request->doner ?? null,
            'contact' => $request->contact,
            'amount' => $request->amount,
            'transaction_time' => now(),
            'timezone' => $timeZone,
        ]);
        if ($donation) {
            return back()->with('success', 'আপনার অনুদান গ্রহণ করা হয়েছে!');
        }
    }

    public function storeSubscribe(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:subscribers,email',
            'agreed' => 'required',
        ]);


        $donation = Subscriber::create($validated);
        if ($donation) {
            return back()->with('success', 'You’ve successfully subscribed. Thank you for joining us!');
        } else {
            return back()->with('error', 'Something is Worng!');
        }
    }

    public function storeMember(Request $request, SmsService $smsService)
    {
        $validatedMember = $request->validate([
            'full_name' => 'required|string|max:200',
            'father' => 'required|string|max:200',
            'mother' => 'required|string|max:200',
            'dob' => 'required|date',
            'mobile' => 'required|string|max:20',
            'email' => 'nullable|email',
            'note' => 'nullable',

            'occupation' => 'nullable|string|max:200',
            'workspace' => 'nullable|string|max:200',
            'education' => 'nullable|string|max:200',

            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

            'member_type' => 'required|in:general,premium,vip,social',
            'donation_amount' => 'nullable',
        ]);
        if ($request->hasFile('photo')) {
            $validatedMember['photo'] = $this->uploadPhoto($request->file('photo'), 'member');
        }
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
        $member = Member::create($validatedMember);
        $memberContact = MemberContact::insert([
            [
                'village' => $validatedContact['village'],
                'post' => $validatedContact['post'],
                'subdistrict' => $validatedContact['subdistrict'],
                'district' => $validatedContact['district'],
                'type' => 'permanent',
                'member_id' => $member->id,
            ],
            [
                'village' => $validatedContact['preVillage'],
                'post' => $validatedContact['prePost'],
                'subdistrict' => $validatedContact['preSubdistrict'],
                'district' => $validatedContact['preDistrict'],
                'type' => 'present',
                'member_id' => $member->id,
            ]
        ]);


        $message = "প্রিয় " . ($validatedMember['full_name'] ?? 'সদস্য') . ", "
            . "আপনাকে সামাজিক সদস্য হিসেবে নিবন্ধিত করা হয়েছে। "
            . "সামাজিক চাঁদার পরিমাণ {$validatedMember['donation_amount']} টাকা। ধন্যবাদ। "
            . "BBBMJM";

        if ($validatedMember['member_type'] === 'social' && $validatedMember['mobile']) {
            $smsService->sendMessage($validatedMember['mobile'], $message);
        }

        if ($member && $memberContact) {
            return back()->with('success', 'সদস্য আবেদন সফলভাবে জমা দেয়া হয়েছে!');
        } else {
            if ($request->photo) {
                $this->deletePhoto($validatedMember['photo'], 'member');
                return back()->with('error', 'দুঃখিত, কিছু ভুল হয়েছে। আবার চেষ্টা করুন।');
            }
        }

    }

    public function storeFeedback(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'subject' => 'nullable|string',
            'message' => 'required|string',
        ]);

        if (Feedback::create($validated)) {
            return back()->with('success', 'আপনার বার্তা সফলভাবে পাঠানো হয়েছে!');
        } else {
            return back()->with('error', 'দুঃখিত, কিছু ভুল হয়েছে। আবার চেষ্টা করুন।');
        }
    }

    public function storeStudent(Request $request)
    {
        $data = $request->validate([
            'class' => 'required|string|max:50',
            'session' => 'required',

            'name_bn' => 'required|string|max:100',
            'name_en' => 'required|string|max:100',
            'birth_reg_no' => 'required|string|max:30',
            'dob' => 'required|date',
            'image' => 'required|image|max:2048',

            'father_name' => 'required|string|max:100',
            'mother_name' => 'required|string|max:100',

            'mobile' => 'required|string',
            'email' => 'nullable|email|max:100',

            'nationality' => 'nullable|string|max:50',
            'blood_group' => 'nullable|string|in:A+,A-,B+,B-,AB+,AB-,O+,O-',

            'guardian_name' => 'nullable|string|max:100',
            'previous_school' => 'nullable|string|max:150',
        ]);
        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadPhoto($request->file('image'), 'student');
        }

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
        $student = Student::create($data);
        $contact = StudentContact::insert([
            [
                'village' => $validatedContact['village'],
                'post' => $validatedContact['post'],
                'subdistrict' => $validatedContact['subdistrict'],
                'district' => $validatedContact['district'],
                'type' => 'permanent',
                'student_id' => $student->id,
            ],
            [
                'village' => $validatedContact['preVillage'],
                'post' => $validatedContact['prePost'],
                'subdistrict' => $validatedContact['preSubdistrict'],
                'district' => $validatedContact['preDistrict'],
                'type' => 'present',
                'student_id' => $student->id,
            ]
        ]);


        if ($student && $contact) {
            return back()->with('success', 'আবেদন সফলভাবে জমা দেয়া হয়েছে!');
        } else {
            if ($request->image) {
                $this->deletePhoto($data['image'], 'student');
                return back()->with('error', 'দুঃখিত, কিছু ভুল হয়েছে। আবার চেষ্টা করুন।');
            }
        }
    }
}
