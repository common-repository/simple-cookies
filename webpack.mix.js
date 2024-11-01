/*
 * AWPS uses Laravel Mix
 *
 * Check the documentation at
 * https://laravel.com/docs/5.6/mix
 */

let mix = require('laravel-mix')

// BrowserSync and LiveReload on `npm run watch` command
// Update the `proxy` and the location of your SSL Certificates if you're developing over HTTPS
// mix.browserSync({
//     proxy: 'simple-cookies.loc',
// 	// https: {
// 	// 	key: '/your/certificates/location/your-local-domain.key',
// 	// 	cert: '/your/certificates/location/your-local-domain.crt'
//     // },
//     host: 'simple-cookies.loc',
// 	files: [
// 		'**/*.php',
// 		'src/css/**/*.scss',
// 		'src/js/**/*.js'
// 	],
// 	injectChanges: true,
// 	open: false
// });

// Autloading jQuery to make it accessible to all the packages, because, you know, reasons
// You can comment this line if you don't need jQuery
mix.autoload({
  jquery: ['$', 'window.jQuery', 'jQuery'],
})

mix.setPublicPath('./assets/')

// Compile assets
mix.js('src/js/simple-cookie.js', 'assets/js').
  js('src/js/simple-cookie.admin.js', 'assets/js').
  js('src/js/shortcode-button.js', 'assets/js').
  sass('src/scss/simple-cookie.scss', 'assets/css').
  sass('src/scss/simple-cookie.admin.scss', 'assets/css')

// Add versioning to assets in production environment
if (mix.inProduction()) {
  mix.version()
}