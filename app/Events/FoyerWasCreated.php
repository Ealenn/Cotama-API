<?php

namespace App\Events;

use App\Models\Foyers\Foyer;
use App\User;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class FoyerWasCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private $user = null;
    private $foyer = null;

    /**
     * FoyerWasCreated constructor.
     * @param User $user
     * @param Foyer $foyer
     */
    public function __construct(User $user, Foyer $foyer)
    {
        $this->user = $user;
        $this->foyer = $foyer;
    }

    /**
     * @return Foyer
     */
    public function getFoyer() : Foyer {
        return $this->foyer;
    }

    /**
     * @return User
     */
    public function getUser() : User {
      return $this->user;
    }
}
