<?php

namespace App\Mail;

use App\Models\Foyers\Foyer;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailFoyerUserDelete extends Mailable
{
    use Queueable, SerializesModels;
    protected $foyer;
    protected $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, Foyer $foyer)
    {
        $this->user = $user;
        $this->foyer=$foyer;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('FoyerUserDelete')
            ->subject(__('mail.foyer.userdelete.subject'))
            ->with([
                'User' => $this->user,
                'Foyer' => $this->foyer
            ]);
    }
}
