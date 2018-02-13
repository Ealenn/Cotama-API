<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Routing\Redirector;
use Illuminate\Http\Request;
use Illuminate\Foundation\Application;

class Language {

    public function __construct(Application $app, Redirector $redirector, Request $request) {
        $this->app = $app;
        $this->redirector = $redirector;
        $this->request = $request;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Segments
        $segments = $request->segments();

        // Locals Web
        $configurationLocals = $this->app->config->get('app.locales');

        // Make sure current locale exists.
        $locale = $request->segment(1);
        if (array_key_exists($locale, $configurationLocals)) {
            $this->app->setLocale($locale);
            return $next($request);
        }

        // Not in array
        // Try local of browser
        $HTTP_ACCEPT_LANGUAGE = preg_split(
            "/[\s,;]+/",
            $request->server('HTTP_ACCEPT_LANGUAGE')
        );

        foreach ($HTTP_ACCEPT_LANGUAGE as $browser){
            if(array_key_exists($browser, $configurationLocals)){
                $this->app->setLocale($browser);
                return $next($request);
            }
        }

        // Default
        $this->app->setLocale($this->app->config->get('app.fallback_locale'));
        return $next($request);
    }

}