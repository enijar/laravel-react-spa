<?php

namespace App\Mail;

use App\DeBeers\Entities\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendResetPassword extends Mailable
{
    use Queueable, SerializesModels;

    public $user, $token;

    /**
     * Create a new message instance.
     *
     * @param User $user
     * @param string $code
     */
    public function __construct(User $user, string $token)
    {

        $this->user = $user;
        $this->token = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this
            ->subject(config('avatar.mail.password.reset'))
            ->to($this->user->getAttribute('email'), $this->user->getFullName())
            ->from(config('avatar.mail.reset-password.from.email'), config('avatar.mail.reset-password.from.name'))
            ->view('mail.reset-password', [
                'code' => $this->token,
            ]);
    }
}
