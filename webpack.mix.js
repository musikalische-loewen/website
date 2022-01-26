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
    mix.then(function () {
        // Fonts versioned by processCssUrls in the CSS files use MD5 while Mix uses a different hash versioning system.
        // This workaround adds font entries using the MD5 scheme so that all files are versioned properly with the same scheme.
        jsonfile.readFile(mixManifest, function (err, obj) {
            const newJson = {};
            _.forIn(obj, function (value, key) {
                newJson[key] = value;
            });
            fs.readdir('public/fonts', function (err, files) {
                files.forEach(function (file, index) {
                    const path = 'public/fonts/' + file;
                    newJson['/fonts/' + file] = '/fonts/' + file + "?" + md5(fs.readFileSync(path));
                });
                jsonfile.writeFile(mixManifest, newJson, {spaces: 2}, function (err) {
                    if (err) console.error(err);
                });
            });
        });
    });
}
