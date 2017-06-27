<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Routing\Router;
use Illuminate\Http\Request;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map(Router $router, Request $request)
    {
        $locale = $request->segment(1);

        if (array_key_exists($locale, $this->app->config->get('app.locales'))) {
            $this->app->setLocale($locale);
            $router->group(['namespace' => $this->namespace, 'prefix' => $locale], function($router) {
                $this->mapApiRoutes(false);
                $this->mapWebRoutes(false);
            });
        } else {
            $this->mapApiRoutes();
            $this->mapWebRoutes();
        }
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     * @param $isNamespaced bool
     * @return void
     */
    protected function mapWebRoutes($isNamespaced = true)
    {
        if($isNamespaced){
            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));
        } else {
            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        }
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     * @param $isNamespaced bool
     * @return void
     */
    protected function mapApiRoutes($isNamespaced = true)
    {
        if($isNamespaced){
            Route::prefix('api')
             ->middleware(['api', 'cors'])
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
        } else {
            Route::prefix('api')
             ->middleware(['api', 'cors'])
             ->group(base_path('routes/api.php'));
        }
    }
}
