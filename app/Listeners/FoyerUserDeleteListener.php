<?php

namespace App\Listeners;

use App\Events\FoyerUserDelete;
use App\Mail\MailFoyerUserDelete;
use Illuminate\Support\Facades\Mail;

class FoyerUserDeleteListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * @param FoyerUserDelete $event
     */
    public function handle(FoyerUserDelete $event)
    {
        $users = $event->getFoyer()->users;

        Mail::to($users)->send(new MailFoyerUserDelete($event->getFoyer()));
    }
}
