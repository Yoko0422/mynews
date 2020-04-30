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
   .sass('resources/sass/app.scss', 'public/css')
   .sass('resources/sass/admin.scss', 'public/css')
   //PHP/Laravel 11 Bladeテンプレートの継承とLaravel Mixの使い方を活用してみよう 課題6
   .sass('resources/sass/profile.scss', 'public/css') 
   .sass('resources/sass/front.scss', 'public/css'); // PHP18