<?php

namespace Jameron\Invitations\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Invitation extends Mailable
{
    use Queueable, SerializesModels;

    protected $invitation;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($invitation)
    {
        $this->invitation = $invitation;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(config('invitations.from'))
            ->view('invitations::emails.invitation')
            ->with('invitation', $this->invitation);
    }
}
