<?php

namespace App\Events;

use App\Models\Foyers\Foyer;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class FoyerWasCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private $foyer = null;

    /**
     * FoyerWasCreated constructor.
     * @param $foyer
     */
    public function __construct(Foyer $foyer)
    {
        $this->foyer = $foyer;
    }

    /**
     * @return Foyer
     */
    public function getFoyer(){
        return $this->foyer;
    }
}
