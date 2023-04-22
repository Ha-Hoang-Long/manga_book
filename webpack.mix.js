const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
mix.js('resources/js/owl.carousel.js', 'public/js')
    .postCss('resources/css/owl.carousel.min.css', 'public/css')
    .postCss('resources/css/owl.theme.default.min.css', 'public/css')
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]);
