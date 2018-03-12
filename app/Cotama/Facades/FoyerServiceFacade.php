<?php

namespace App\Cotama\Facades;

use \Illuminate\Support\Facades\Facade;

/**
 * Class FoyerServiceFacade
 * @package App\Cotama\Facades
 */
class FoyerServiceFacade extends Facade {

    /**
     * @return string
     */
    protected static function getFacadeAccessor() { return 'App\Cotama\Service\FoyerService'; }

}