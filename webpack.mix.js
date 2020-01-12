const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');
mix.styles(['resources/admincssjs/bootstrap/css/dropzone.min.css'],'public/admincssjs/dist/css/dropzone.min.css')
    .scripts(['resources/admincssjs/bootstrap/js/dropzone.min.js'],'public/admincssjs/dist/js/dropzone.min.js');
