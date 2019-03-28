/*
 * AWPS uses Laravel Mix
 *
 * Check the documentation at
 * https://laravel.com/docs/5.6/mix
 */

let mix = require("laravel-mix");

// BrowserSync and LiveReload on `npm run watch` command
// Update the `proxy` and the location of your SSL Certificates if you're developing over HTTPS
// mix.browserSync({
//   proxy: "http://eae.test",
//   // https: {
//   // 	key: '/your/certificates/location/your-local-domain.key',
//   // 	cert: '/your/certificates/location/your-local-domain.crt'
//   // },
//   files: ["**/*.php", "assets/dist/css/**/*.css", "assets/dist/js/**/*.js"],
//   injectChanges: true,
//   open: false
// });

// Autloading jQuery to make it accessible to all the packages, because, you know, reasons
// You can comment this line if you don't need jQuery
mix.autoload({
  jquery: ["$", "window.jQuery", "jQuery"]
});

mix.setPublicPath("./assets/dist");

// Compile assets
mix
  .combine(
    [
      "assets/src/scripts/vendor/jquery-3.2.1.min.js",
      "assets/src/scripts/vendor/jquery-migrate-3.0.1.min.js",
      "assets/src/scripts/vendor/popper.min.js",
      "assets/src/scripts/vendor/bootstrap.min.js",
      "assets/src/scripts/vendor/jquery.easing.1.3.js",
      "assets/src/scripts/vendor/jquery.waypoints.min.js",
      "assets/src/scripts/vendor/jquery.stellar.min.js",
      "assets/src/scripts/vendor/owl.carousel.min.js",
      "assets/src/scripts/vendor/aos.js"
    ],
    "assets/dist/js/vendor.js"
  )
  .combine(["assets/src/scripts/app.js"], "assets/dist/js/app.js")
  .js("assets/src/scripts/admin.js", "assets/dist/js")
  .react("assets/src/scripts/gutenberg.js", "assets/dist/js")
  .sass("assets/src/sass/style.scss", "assets/dist/css")
  .sass("assets/src/sass/admin.scss", "assets/dist/css")
  .sass("assets/src/sass/gutenberg.scss", "assets/dist/css");

// Add versioning to assets in production environment
if (mix.inProduction()) {
  mix.version();
}
