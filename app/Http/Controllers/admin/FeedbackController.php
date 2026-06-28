<?php

namespace App\Http\Controllers\admin;

use App\AccessTrait;
use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FeedbackController extends Controller
{
    use AccessTrait;
    public function index()
    {
        if ($this->hasPermission()) {
            $feedbacks = Feedback::latest()->get();
            return view('admin.views.list.FeedbackList', compact('feedbacks'));
        } else {
            return back()->with('error', "Access denied. You are not authorized to perform this action.");
        }
    }

    public function reply(Request $request, string $id)
    {
        if ($this->hasPermission()) {
            $data = $request->validate([
                'reply' => 'required|string',
            ]);

            $feedback = Feedback::findOrFail($id);
            $subject = 'Re: ' . ($feedback->subject ?: 'Your feedback');

            Mail::raw($data['reply'], function ($message) use ($feedback, $subject) {
                $message->to($feedback->email, $feedback->name)
                    ->subject($subject);
            });

            $feedback->update([
                'reply' => $data['reply'],
            ]);

            return back()->with('success', 'Reply sent successfully!');
        } else {
            return back()->with('error', "Access denied. You are not authorized to perform this action.");
        }
    }

    public function destroy(string $id)
    {
        if ($this->hasPermission()) {
            $feedback = Feedback::findOrFail($id);
            $feedback->delete();
            return back()->with('success', "Delete successfully!");
        } else {
            return back()->with('error', "Access denied. You are not authorized to perform this action.");
        }

    }
}
