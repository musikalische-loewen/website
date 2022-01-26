const mix = require('laravel-mix');
const _ = require('lodash');
const jsonfile = require('jsonfile');
const fs = require('fs');
const md5 = require('md5');
const mixManifest = 'public/mix-manifest.json';
require('laravel-mix-purgecss');

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
    .sass('resources/sass/app.scss', 'public/css')
    .purgeCss({
        safelist: [/^lg/], // For classes from lightgallery.js
    });

if (mix.inProduction()) {
    mix.sourceMaps();
    mix.version();
    mix.options({
        processCssUrls: false, // TODO: This option should not be set to false but required due to https://github.com/laravel-mix/laravel-mix/issues/2025 at the moment
    });
}
