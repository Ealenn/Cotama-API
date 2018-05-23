<?php

namespace App\Mail;

use App\Models\Foyers\Foyer;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailFoyerUserJoin extends Mailable
{
    use Queueable, SerializesModels;
    protected $foyer;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Foyer $foyer)
    {
        $this->foyer=$foyer;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('FoyerUserJoin')
            ->with([
                'name' => $this->foyer->name,
            ]);
    }
}
