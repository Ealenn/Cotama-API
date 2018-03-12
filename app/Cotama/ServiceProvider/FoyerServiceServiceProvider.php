<?php

namespace App\Cotama\ServiceProvider;

use App\Cotama\Services\FoyerService;
use Illuminate\Support\ServiceProvider;

/**
 * Class FoyerServiceServiceProvider
 * @package App\Cotama\ServiceProvider
 */
class FoyerServiceServiceProvider extends ServiceProvider{

    /**
     *
     */
    public function register(){
        $this->app->bind('App\Cotama\Service\FoyerService', function($app){
            return new FoyerService($app->make('App\Cotama\Repositories\Interfaces\FoyerInterface'));
        });
    }
}