<?php

namespace App\Mail;

use App\DeBeers\Entities\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendForgotPasswordMail extends Mailable
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
            ->subject(config('avatar.mail.forgotten-password.subject'))
            ->to($this->user->getAttribute('email'), $this->user->getFullName())
            ->from(config('avatar.mail.forgotten-password.from.email'), config('avatar.mail.forgotten-password.from.name'))
            ->view('mail.forgot', [
                'user' => $this->user,
            ]);
    }
}
