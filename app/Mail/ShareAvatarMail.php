<?php

namespace App\Mail;

use App\DeBeers\Entities\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ShareAvatarMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user, $colleague;

    /**
     * Create a new message instance.
     *
     * @param User $user
     * @param \stdClass $colleague
     */
    public function __construct(User $user, \stdClass $colleague)
    {
        $this->user = $user;
        $this->colleague = $colleague;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject(config('avatar.mail.share-avatar.subject'))
            ->to($this->colleague->email, $this->colleague->name)
            ->from(config('avatar.mail.share-avatar.from.email'), config('avatar.mail.share-avatar.from.name'))
            ->view('mail.share-avatar');
    }
}
