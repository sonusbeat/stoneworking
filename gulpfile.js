var elixir = require('laravel-elixir');
// elixir.config.sourcemaps = false;

elixir(function(mix) {
	/* ################## Public ################## */
    mix.sass('main.scss', 'public/css/main.min.css');

    // mix.styles([
    // 	'fontastic.css',
    //     'magnific-popup.css',
    // ], 'public/css/libraries.min.css');

    // mix.scripts([
    // 	'scrollreveal.min.js',
    // 	'jquery.magnific-popup.min.js',
    //  'jquery.goup.js',
    //  'jquery.easing.min.js',
    // 	'creative.min.js',
    // ], 'public/js/libraries.min.js');
    
    mix.browserSync({
        proxy: 'www.stoneworking.dev'
    });
});