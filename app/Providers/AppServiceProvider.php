<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Todo: Delete this in PROD MODE
        // Syntax error or access violation: 1071 Specified key was too long; max key length is 767 bytes
        // For those running MariaDB or older versions of MySQL you may hit this error when trying to run migrations
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
