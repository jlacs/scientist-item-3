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
mix.js('resources/js/scientist/save.js', 'public/js/scientist')
mix.js('resources/js/scientist/edit.js', 'public/js/scientist')
mix.js('resources/js/scientist/create.js', 'public/js/scientist')
mix.js('resources/js/scientist/delete.js', 'public/js/scientist')

mix.js('resources/js/theory/save.js', 'public/js/theory')
mix.js('resources/js/theory/edit.js', 'public/js/theory')
mix.js('resources/js/theory/create.js', 'public/js/theory')
mix.js('resources/js/theory/delete.js', 'public/js/theory')
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]);
