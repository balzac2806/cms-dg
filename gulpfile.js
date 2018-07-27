var elixir = require('laravel-elixir');

require('laravel-elixir-vue');

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

var gulp = require('gulp');
var htmlbuild = require('gulp-htmlbuild');
var runSequence = require('run-sequence');

gulp.task('default', function (callback) {
    runSequence('build', callback);
});

gulp.task('build', function () {
  gulp.src(['front/views/**/*.html'])
    .pipe(htmlbuild({
      js: htmlbuild.preprocess.js(function (block) {
        block.write('buildresult.js');
        block.end();
      })
    }))
    .pipe(gulp.dest('public/views/'));
});

elixir.config.assetsPath = 'front/';

elixir(mix => {
  mix
    .less(
      'app.less', 'public/css'
    )
    .less(
      'bootstrap/bootstrap.less', 'public/css'
    )
    .styles([
      'style.css'
    ], 'public/css/all.css', 'front/styles')
    .scripts([
      'libs/**/*.js',
      'app.js',
      'appRoutes.js',
      'controllers/**/*.js',
      'services/**/*.js',
      'directives/**/*.js'
    ], 'public/js/all.js', 'front/scripts')
    .copy('front/views', 'public/views')
    .copy('front/fonts', 'public/fonts')
    .version([
      'css/all.css',
      'css/app.css',
      'js/all.js'
    ]);
});
