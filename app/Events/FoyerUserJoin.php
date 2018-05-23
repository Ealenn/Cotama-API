<?php

namespace App\Events;

use App\Models\Foyers\Foyer;
use App\User;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class FoyerUserJoin
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private $foyer = null;
    private $user = null;

    /**
     * FoyerUserJoin constructor.
     * @param $user
     * @param $foyer
     */
    public function __construct(Foyer $foyer, User $user)
    {
        $this->foyer = $foyer;
        $this->user = $user;
    }

    /**
     * @return Foyer
     */
    public function getFoyer(){
        return $this->foyer;
    }

    /**
     * @return User
     */
    public function getUser(){
        return $this->user;
    }
}
