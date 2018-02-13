let mix = require('laravel-mix');
// import mix from 'laravel-mix'
/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.disableNotifications();

if (mix.inProduction()) {
  mix.version();
}

mix
  .js('resources/assets/js/app.js', 'public/js');

mix
  .js('resources/assets/js/front.js', 'public/js');
