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
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
    ]);

mix.sass('resources/sass/app.scss', 'public/frontend/css/scss/style.css')
    .options({
        processCssUrls: false
    })
    .minify('public/frontend/css/scss/style.css','public/frontend/css/scss/style.min.css');
// .styles([
//     'public/frontend/css/*.css'
// ], 'public/frontend/css/full.css')
// .minify('public/frontend/css/full.css');


mix.webpackConfig({
    plugins: [],
    resolve: {},
    stats: {
        children: true
    }
});


if (mix.inProduction()) {
    mix.version();
}
