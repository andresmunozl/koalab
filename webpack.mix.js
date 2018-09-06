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

mix.js(['resources/assets/js/app.js',
        'resources/assets/js/user.js',
        'resources/assets/js/sauser.js',
        'resources/assets/js/estudiante.js',
        'resources/assets/js/asistencia.js',
        'resources/assets/js/materia.js',
        'resources/assets/js/programacion.js'
        
    ],

    'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');
