 var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */
/*
elixir(function(mix) {
    mix.sass('app.scss');
});
*/
/*
elixir(function(mix) {
    var bootstrapPath = 'node_modules/bootstrap-sass/assets';
    mix.sass('app.scss')
      .copy(bootstrapPath + '/fonts/bootstrap/*.{ttf,woff,eof,svg,woff2}', 'public/fonts')
      .copy(bootstrapPath + '/javascripts/bootstrap.min.js', 'public/js');
});
*/
elixir(function(mix) {
    var bootstrapPath = 'node_modules/bootstrap-sass/assets';
    var paths = {
        'bootstrap': '/../../../node_modules/bootstrap-sass/assets/javascripts/bootstrap/'
    }

    mix.sass('app.scss')
        .copy(bootstrapPath + '/fonts', 'public/fonts')
        .copy(bootstrapPath + '/javascripts/bootstrap.min.js', 'public/js');

    mix.scripts([
        // paths.bootstrap + 'affix.js',
        paths.bootstrap + 'alert.js',
        // paths.bootstrap + 'button.js',
        paths.bootstrap + 'carousel.js',
        paths.bootstrap + 'collapse.js',
        paths.bootstrap + 'dropdown.js',
        paths.bootstrap + 'modal.js',
        // paths.bootstrap + 'popover.js',
        // paths.bootstrap + 'scrollspy.js',
        paths.bootstrap + 'tab.js',
        paths.bootstrap + 'tooltip.js',
        // paths.bootstrap + 'transition.js',
    ]);

    mix.version(['public/css/app.css', 'public/js/all.js']);

});