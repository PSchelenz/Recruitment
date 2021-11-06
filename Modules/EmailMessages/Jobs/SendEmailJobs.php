<?php

namespace Modules\EmailMessages\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use Illuminate\Support\Facades\Mail;
use Modules\EmailMessages\Emails\EmailSend;

class SendEmailJobs implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $email_from, $email_to, $title, $body, $smtppassword, $filepath;

    public $mail;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(array $attributes)
    {
        $this->email_from = $attributes['email_from'];
        $this->email_to = $attributes['email_to'];
        $this->title = $attributes['title'];
        $this->body = $attributes['body'];

        if(isset($attributes['filepath'])) {
            $this->filepath = $attributes['filepath'];
        }
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email = new EmailSend($this->body, $this->email_from, $this->email_to, $this->title);

        Mail::send($email);
    }
}
