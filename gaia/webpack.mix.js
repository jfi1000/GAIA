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

 mix.js('resources/js/app.js', 'public/js')
    .vue()
    .sass('resources/sass/app.scss', 'public/css');
// if (mix.inProduction()) {
//     mix.js('resources/js/app.js', 'public/js/app.min.js');
//     mix.sass('resources/sass/app.scss', 'public/css/app.min.css');
//     mix.version();
// } else {
//     mix.js('resources/js/app.js', 'public/js/app.js');
//     mix.sass('resources/sass/app.scss', 'public/css');
// }