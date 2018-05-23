<?php

namespace App\Listeners;


use App\Events\FoyerUserJoin;
use App\Mail\MailFoyerUserJoin;
use App\Mail\MailWarnUserJoin;
use Illuminate\Support\Facades\Mail;

class FoyerUserJoinListener
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
     * @param FoyerUserJoin $event
     */
    public function handle(FoyerUserJoin $event)
    {
        Mail::to($event->getUser())->send(new MailFoyerUserJoin($event->getFoyer()));
        Mail::to($event->getFoyer()->users)->send(new MailWarnUserJoin($event->getFoyer(), $event->getUser()));
    }
}
