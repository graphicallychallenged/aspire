var gulp         = require('gulp')
var path         = require('path')
var less         = require('gulp-less')
var sass         = require('gulp-sass')
var autoprefixer = require('gulp-autoprefixer')
var sourcemaps   = require('gulp-sourcemaps')
var cleanCSS     = require('gulp-clean-css')
var rename       = require('gulp-rename')
var concat       = require('gulp-concat')
var uglify       = require('gulp-uglify')
var connect      = require('gulp-connect')
var open         = require('gulp-open')

var Paths = {
  HERE                 : './',
  DIST                 : 'dist',
  DIST_TOOLKIT_JS      : 'dist/aspire.js',
  LESS_TOOLKIT_SOURCES : './less/toolkit*',
  SCSS_TOOLKIT_SOURCES : './scss/main*',
  LESS                 : './less/**/**',
  SCSS                 : './scss/**/**',
  JS                   : [
      './node_modules/bootstrap/js/dist/**/*.js',
      './js/custom/*'
    ]
}

// Unminified versions for development
gulp.task('default', ['less-min', 'scss-min', 'js-min'])

// Do minified versions later
// gulp.task('default', ['less-min', 'scss-min', 'js-min'])

gulp.task('watch', function () {
  gulp.watch(Paths.LESS, ['less']);
  gulp.watch(Paths.SCSS, ['scss']);
  gulp.watch(Paths.JS,   ['js']);
  // gulp.watch(Paths.LESS, ['less-min']);
  // gulp.watch(Paths.SCSS, ['scss-min']);
  // gulp.watch(Paths.JS,   ['js-min']);
})

gulp.task('scss', function () {
  return gulp.src(Paths.SCSS_TOOLKIT_SOURCES)
    .pipe(sourcemaps.init())
    .pipe(sass().on('error', sass.logError))
    .pipe(autoprefixer({
      browsers : ["last 20 versions"]
    }))
    .pipe(sourcemaps.write(Paths.HERE))
    .pipe(gulp.dest(Paths.DIST))
})

gulp.task('scss-min', ['scss'], function () {
  return gulp.src(Paths.SCSS_TOOLKIT_SOURCES)
    .pipe(sourcemaps.init())
    .pipe(sass().on('error', sass.logError))
    .pipe(cleanCSS({compatibility: 'ie10'}))
    .pipe(autoprefixer({
      browsers : ["last 20 versions"]
    }))
    .pipe(rename({
      suffix: '.min'
    }))
    .pipe(sourcemaps.write(Paths.HERE))
    .pipe(gulp.dest(Paths.DIST))
})





gulp.task('less', function () {
  return gulp.src(Paths.LESS_TOOLKIT_SOURCES)
    .pipe(sourcemaps.init())
    .pipe(less())
    .pipe(autoprefixer({
      browsers : ["last 20 versions"]
    }))
    .pipe(sourcemaps.write(Paths.HERE))
    .pipe(gulp.dest('dist'))
})

gulp.task('less-min', ['less'], function () {
  return gulp.src(Paths.LESS_TOOLKIT_SOURCES)
    .pipe(sourcemaps.init())
    .pipe(less())
    .pipe(cleanCSS())
    .pipe(autoprefixer())
    .pipe(rename({
      suffix: '.min'
    }))
    .pipe(sourcemaps.write(Paths.HERE))
    .pipe(gulp.dest(Paths.DIST))
})

gulp.task('js', function () {
  return gulp.src(Paths.JS)
    .pipe(concat('aspire.js'))
    .pipe(gulp.dest(Paths.DIST))
})

gulp.task('js-min', ['js'], function () {
  return gulp.src(Paths.DIST_TOOLKIT_JS)
    .pipe(uglify())
    .pipe(rename({
      suffix: '.min'
    }))
    .pipe(gulp.dest(Paths.DIST))
})
