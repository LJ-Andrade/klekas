let mix = require('laravel-mix');

const VueLoaderPlugin = require('vue-loader/lib/plugin')
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

mix.js('resources/assets/js/app.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css')
    .js('resources/assets/js/web/web.js', 'public/js')
    .sass('resources/assets/sass/web/web.sass', 'public/css')
    .options({
        processCssUrls: false,
        outputStyle: 'compressed'
    })

    // Store
    .js('resources/assets/js/store/scripts.js', 'public/js')
    .sass('resources/assets/sass/store/store-custom.sass', 'public/css')
    .options({
        processCssUrls: false,
        outputStyle: 'compressed'
    })

    // Vadmin 
    .js('resources/assets/js/vadmin-ui.js', 'public/js')
    .js('resources/assets/js/vadmin-functions.js', 'public/js')
    .js('resources/assets/js/vadmin-forms.js', 'public/js')
    .js('resources/assets/js/vadmin-dynamic-forms.js', 'public/js')
    .sass('resources/assets/sass/vadmin/vadmin.sass', 'public/css')
    .webpackConfig({
        plugins: [
            new VueLoaderPlugin()
        ]
    })
    .options({
        processCssUrls: false,
        outputStyle: 'compressed'
    })
    .options({
        sourcemaps: 'inline-source-map'
    })
    .browserSync('http://localhost/bruna/public/');


// Only Styles
// mix.sass('resources/assets/sass/store/store-custom.sass', 'public/css')
//     .options({
//         processCssUrls: false,
//         outputStyle: 'compressed',
//         sourcemaps: 'inline-source-map'
//     })
//     .browserSync('http://localhost/bruna/public/');