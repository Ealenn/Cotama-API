<?php

namespace App\Listeners;


use App\Events\FoyerUserJoin;
use App\Mail\MailFoyerUserJoin;
use App\Mail\MailWarnUserJoin;
use App\User;
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
        $AllUsersInFoyer = $event->getFoyer()->users; // All users
        $UserWasJoin = $event->getUser();

        foreach ($AllUsersInFoyer as $User) {
          if ($User->email != $UserWasJoin->email) {
            Mail::to($User)->send(
              new MailWarnUserJoin(
                $User,
                $event->getFoyer(),
                $UserWasJoin
              )
            );
          }
        }

        Mail::to($UserWasJoin)->send(
          new MailFoyerUserJoin(
            $UserWasJoin,
            $event->getFoyer()
          )
        );
    }
}
