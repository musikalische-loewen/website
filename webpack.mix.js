const mix = require('laravel-mix');
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
    mix.webpackConfig({
        module: {
            rules: [{
                // Overwriting file-loader rule for fonts in order to remove the hash (so we can pre-load without downloading it twice)
                test: /(\.(woff2?|ttf|eot|otf)$|font.*\.svg$)/,
                loaders: [{
                    loader: 'file-loader',
                    options: {
                        name: (path) => {
                            if (!/node_modules|bower_components/.test(path)) {
                                return 'fonts/[name].[ext]';
                            }
                            const pathUpdated = path.replace(/\\/g, '/').replace(/((.*(node_modules|bower_components))|fonts|font|assets)\//g, '');
                            return `fonts/vendor/${pathUpdated}`;
                        },
                    },
                }],
            }],
        },
    });
}
