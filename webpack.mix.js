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
mix.copy('resources/images', 'public/images')
mix.js('resources/js/app.js', 'public/js')
    .vue()
    .sass('resources/sass/app.scss', 'public/css');
mix.styles('resources/css/font-awesome.css', 'public/css/font-awesome.css')
mix.styles('resources/css/font-awesome.min.css', 'public/css/font-awesome.min.css')
mix.styles('resources/css/apphome.css', 'public/css/apphome.css')
mix.styles('resources/css/auth.css', 'public/css/auth.css')
mix.styles('resources/css/game.css', 'public/css/game.css')
mix.styles('resources/css/contacts.css', 'public/css/contacts.css')
mix.styles('resources/css/fh.css', 'public/css/fh.css')
mix.styles('resources/css/filters.css', 'public/css/filters.css')
mix.styles('resources/css/fonts.css', 'public/css/fonts.css')
mix.styles('resources/css/reg.css', 'public/css/reg.css')
mix.styles('resources/css/support.css', 'public/css/support.css')
mix.styles('resources/css/user.css', 'public/css/user.css')
mix.styles('resources/css/gamecrud.css', 'public/css/gamecrud.css')
mix.styles('resources/css/usercrud.css', 'public/css/usercrud.css')
