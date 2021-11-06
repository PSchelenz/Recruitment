<?php

namespace Modules\EmailMessages\Emails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailSend extends Mailable
{
    use Queueable, SerializesModels;
    protected $body, $filepath;
    public $from_user, $to_user, $title;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $body, string $from_user, string $to_user, string $title)
    {
        $this->body = $body;
        $this->from_user = $from_user;
        $this->to_user = $to_user;
        $this->title = $title;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->from_user, 'Example')
            ->to($this->to_user, 'Receiver')
            ->subject($this->title)
            ->view('emailmessages::message', [
                'body' => $this->body
            ]);
    }
}
