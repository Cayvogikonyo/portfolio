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

mix.js('resources/js/app.js', 'public/js').vue()
    .js('resources/js/theme.js', 'public/js/theme.js')
    .js('resources/js/animation.js', 'public/js/animation.js')
    .js('resources/js/contactus.js', 'public/js/contactus.js')
    .js('resources/js/layout1.js', 'public/js/layout1.js')
    .js('resources/js/sidebar.js', 'public/js/sidebar.js')
    // .postCss('resources/css/app.css', 'public/css', [
    //     require('postcss-import'),
    //     require('tailwindcss'),
    //     require('autoprefixer'),
    // ])
    .webpackConfig(require('./webpack.config'));

if (mix.inProduction()) {
    mix.version();
}
