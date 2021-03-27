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

mix
.styles([
    'node_modules/@fortawesome/fontawesome-free/css/all.css',
    'resources/css/default.css',
    'resources/css/footer.css',
    'resources/css/global.css',
    'resources/css/navbar.css',
    ], 'public/css/global-styles.css')

.styles([
    'resources/css/infinite-scroller.css',
    'resources/css/slider.css',
    'resources/css/home.css'
], 'public/css/home-styles.css')

.copy(
    'node_modules/@fortawesome/fontawesome-free/webfonts',
    'public/webfonts'
)

.scripts([
    'resources/js/infinite-scroller.js',
    'resources/js/simulator.js',
    'resources/js/slider-opinions.js',
], 'public/js/home-script.js')

.scripts([
    //'resources/js/app.js',
    //'resources/js/bootstrap.js',
    'resources/js/navbar.js',
], 'public/js/global-script.js')
    
.version()
