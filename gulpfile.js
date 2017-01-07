const elixir = require('laravel-elixir');
var gulp     = require('gulp');
var semantic = {
    buildCss: require('./semantic/tasks/build/css')
};

gulp.task('build-ui', semantic.buildCss);

elixir(mix => {

    // Convert SASS to CSS. Add your additional SASS file to this folder:
    // resources/assets/sass
    mix.sass(['app.scss'], 'public/dist')

    // combine all CSS files into single file
    .styles([
            './public/lib/semantic-ui/semantic.min.css',
            './public/lib/calendar/calendar.css',
            './public/dist/app.css'
        ],
        'public/dist'
    )

    // combine all JS files into single file
    .scripts([
            './public/lib/jquery/jquery-3.1.0.min.js',
            './public/lib/semantic-ui/semantic.min.js',
            './public/lib/jquery.nicescroll/jquery.nicescroll.min.js',
            './public/lib/calendar/calendar.js',
            'components/flash.js',
            'app.js'
        ],
        'public/dist'
    )

    // copy Semantic-UI theme assets (icon, flag, etc)
    .copy('./public/lib/semantic-ui/themes', './public/build/dist/themes')

    // copy embedded fonts
    .copy('resources/assets/fonts', './public/build/fonts')

    // file versioning to avoid cache
    .version(['dist/all.css', 'dist/all.js']);

});
