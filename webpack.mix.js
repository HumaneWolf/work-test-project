let mix = require('laravel-mix');

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

mix.scripts( // Vendor js
    [
        'resources/assets/js/vendor/jquery.js',         // Jquery, because the Foundation framework includes it.
        'resources/assets/js/vendor/foundation.js',     // Foundation
        'resources/assets/js/vendor/what-input.js',     // What input
    ],
'public/js/vendor.js'
)
.styles( // Foundation framework CSS
    [
        'resources/assets/css/foundation.css'
    ],
    'public/css/foundation.css'
)
.less('resources/assets/less/app.less', 'public/css') // App CSS
.options({
    processCssUrls: false
 });
