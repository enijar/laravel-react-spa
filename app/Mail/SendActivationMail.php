<?php

namespace App\Mail;

use App\DeBeers\Entities\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendActivationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    /**
     * Create a new message instance.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject(config('avatar.mail.activate.subject'))
            ->to($this->user->getAttribute('email'), $this->user->getFullName())
            ->from(config('avatar.mail.activate.from.email'), config('avatar.mail.activate.from.name'))
            ->view('mail.activate', [
                'user' => $this->user,
            ]);
    }
}
