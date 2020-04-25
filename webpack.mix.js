const mix = require('laravel-mix');

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

mix.js('resources/js/web/web.js', 'public/web/js')
mix.js('resources/js/admin/admin.js', 'public/admin/js')
.sass('resources/sass/web/web.scss', 'public/web/css')
    .sass('resources/sass/admin/admin.scss', 'public/admin/css');
