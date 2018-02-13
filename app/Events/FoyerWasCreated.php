<?php

namespace App\Events;

use App\Models\Foyers\Foyer;
use App\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class FoyerWasCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private $User = null;
    private $Foyer = null;

    /**
     * FoyerWasCreated constructor.
     * @param $user
     * @param $foyer
     */
    public function __construct($user, $foyer)
    {
        $this->User = $user;
        $this->Foyer = $foyer;
    }

    /**
     * @return User
     */
    public function getUser(){
        if(!$this->User instanceof User){
            $this->User = User::find($this->User);
        }

        return $this->User;
    }

    /**
     * @return Foyer
     */
    public function getFoyer(){
        if(!$this->Foyer instanceof Foyer){
            $this->User = Foyer::find($this->Foyer);
        }

        return $this->Foyer;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('foyer.was.created');
    }
}
