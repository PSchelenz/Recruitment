<?php

namespace Modules\EmailMessages\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Validation\Rule;
use Modules\EmailMessages\Jobs\SendEmailJobs;

class EmailMessagesController extends Controller
{
    public function create()
    {
        return view('emailmessages::email');
    }

    public function send(Request $request) {
        $attributes = $request->validate([
            'email_from' => ['required', 'email', Rule::exists('users', 'email')],
            'email_to' => 'required|email',
            'title' => 'required|max:255',
            'body' => 'required',
            'filepath' => 'file'
        ]);

        for($i = 0; $i < 3; $i++) {
            SendEmailJobs::dispatch($attributes);
        }

        return back()->with('success', 'Email has been sent.');
    }
}
