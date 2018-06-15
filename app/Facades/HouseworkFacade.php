<?php

namespace App\Facades;


use Illuminate\Support\Facades\Facade;

class HouseworkFacade extends Facade {
    protected static function getFacadeAccessor() { return 'HouseworkService'; }
}