<?php

namespace App\Cotama\ServiceProvider;

use App\Cotama\Repositories\Eloquent\FoyerRepository;
use Illuminate\Support\ServiceProvider;

/**
 * Class FoyerRepositoryServiceProvider
 * @package App\Cotama\ServiceProvider
 */
class FoyerRepositoryServiceProvider extends ServiceProvider{

    /**
     * 
     */
    public function register(){
        $this->app->bind('App\Cotama\Repositories\Interfaces\FoyerInterface', function($app){
           return new FoyerRepository($app);
        });
    }
}