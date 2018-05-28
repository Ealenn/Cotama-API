<?php

namespace App\Listeners;

use \App\Mail\MailFoyerWasCreated;
use \App\Events\FoyerWasCreated;
use Illuminate\Support\Facades\Mail;

class FoyerWasCreatedListener
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
     * @param FoyerWasCreated $event
     */
    public function handle(FoyerWasCreated $event)
    {
        $users = $event->getFoyer()->users;

        if($users->count() == 1){
            Mail::to($users)->send(
              new MailFoyerWasCreated(
                $event->getUser(),
                $event->getFoyer())
            );
        }
    }
}
