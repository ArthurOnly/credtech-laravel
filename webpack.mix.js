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

.styles([
    'resources/css/taxas.css',
], 'public/css/taxas-styles.css')

.styles([
    'resources/css/contact.css',
], 'public/css/contact-styles.css')

.styles([
    'resources/css/loan.css',
], 'public/css/loan-styles.css')

.styles([
    'resources/css/quem-somos.css',
], 'public/css/quem-somos-styles.css')

.styles([
    'resources/css/faq.css',
], 'public/css/faq-styles.css')

.styles([
    'resources/css/admin.css',
], 'public/css/admin-styles.css')

.styles([
    'resources/css/auth/auth.css',
], 'public/css/auth-styles.css')

.copy(
    'node_modules/@fortawesome/fontawesome-free/webfonts',
    'public/webfonts'
)

.scripts([
    'resources/js/infinite-scroller.js',
    'resources/js/simulator.js',
    'resources/js/slider-opinions.js',
    'resources/js/verify_fields.js',
], 'public/js/home-script.js')

.scripts([
    //'resources/js/app.js',
    //'resources/js/bootstrap.js',
    'resources/js/navbar.js',
], 'public/js/global-script.js')

.scripts([
    'resources/js/taxas.js',
], 'public/js/taxas-script.js')

.scripts([
    'resources/js/jquery.js',
    'resources/js/jquery.mask.js'
], 'public/js/jquery.js')

.scripts([
    'resources/js/verify_fields.js',
    'resources/js/loan.js',
], 'public/js/loan-script.js')

.scripts([
    'resources/js/verify_fields.js',
    'resources/js/desc-tit.js',
], 'public/js/desc-tit.js')

.scripts([
    'resources/js/verify_fields.js',
    'resources/js/contact.js',
], 'public/js/contact-script.js')

.scripts([
    'resources/js/faq.js',
], 'public/js/faq-script.js')
    
.version()
