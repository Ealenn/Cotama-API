<?php

namespace App\Mail;

use App\Models\Foyers\Foyer;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailWarnUserJoin extends Mailable
{
    use Queueable, SerializesModels;
    protected $user;
    protected $foyer;
    protected $userWasJoin;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, Foyer $foyer, User $userWasJoin)
    {
        $this->user = $user;
        $this->foyer = $foyer;
        $this->userWasJoin = $userWasJoin;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('FoyerWarnUserJoin')
            ->subject(__('mail.foyer.warnuser.subject', ['name' => $this->userWasJoin->pseudo]))
            ->with([
                'User' => $this->user,
                'Foyer' => $this->foyer,
                'UserJoin' => $this->userWasJoin,
            ]);
    }
}
