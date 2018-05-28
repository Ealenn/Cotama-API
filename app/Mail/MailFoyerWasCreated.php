<?php

namespace App\Mail;

use App\Models\Foyers\Foyer;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailFoyerWasCreated extends Mailable
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
        $this->foyer = $foyer;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('FoyerWasCreated')
                    ->with([
                        'User' => $this->user,
                        'Foyer' => $this->foyer
                     ]);
    }
}
