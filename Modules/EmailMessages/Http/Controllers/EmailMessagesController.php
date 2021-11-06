<?php

namespace Modules\EmailMessages\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Validation\Rule;
use Modules\EmailMessages\Jobs\SendEmailJobs;
use Modules\Users\Http\Controllers\UserController;
use Modules\Users\Repository\UserRepositoryInterface;

class EmailMessagesController extends Controller
{
    public function create()
    {
        return view('emailmessages::email');
    }

    public function send(Request $request) {
        $attributes = $request->validate([
            'email_from' => ['required', 'email'], //Rule::exists('users', 'email')]
            'email_to' => 'required|email',
            'title' => 'required|max:255',
            'body' => 'required',
            'filepath' => 'file'
        ]);

        for($i = 0; $i < 3; $i++) {
            SendEmailJobs::dispatch($attributes);
        }
    }
}
