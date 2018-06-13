<?php

namespace App\Facades;


use Illuminate\Support\Facades\Facade;

class MissionFacade extends Facade {
    protected static function getFacadeAccessor() { return 'MissionService'; }
}