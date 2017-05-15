'use strict';

let gulp = require('gulp');
let sass = require('gulp-sass');
let minifyHtml = require('gulp-minify-html');
let concat = require('gulp-concat');
let rename = require('gulp-rename');
let uglify = require('gulp-uglify');
let cleanCss = require('gulp-clean-css');
let order = require('gulp-order');
let ngAnnotate = require('gulp-ng-annotate');


gulp.task('sass', function () {
    return gulp.src([
        './assets/**/*.scss',
        './bower_components/angular-bootstrap/ui-bootstrap-csp.css'
    ]).pipe(sass().on('error', sass.logError))
        .pipe(concat('bundle.css'))
        .pipe(cleanCss({compatibility: 'ie8'}))
        .pipe(gulp.dest('../www/css'));
});

gulp.task('sass:watch', function () {
    gulp.watch('./assets/**/*.scss', ['sass']);
});

gulp.task('html', function () {
    gulp.src('./app/**/*.html') // path to your files
        .pipe(minifyHtml())
        .pipe(gulp.dest('../www/'));
});

gulp.task('img', function () {
    gulp.src('./assets/images/**/*') // path to your files
        .pipe(gulp.dest('../www/images/'));
});

gulp.task('fonts', function () {
    gulp.src('./bower_components/bootstrap/fonts/*') // path to your files
        .pipe(gulp.dest('../www/fonts/bootstrap'));
});


let jsBundle = gulp.src([
    './bower_components/angular-route/angular-route.js',
    './bower_components/angular/angular.js',
    './bower_components/angular-bootstrap/ui-bootstrap-tpls.js',
    './bower_components/angular-cookies/angular-cookies.js',
    './bower_components/query-string/query-string.js',
    './bower_components/angular-oauth2/dist/angular-oauth2.js',
    './bower_components/angular-local-storage/dist/angular-local-storage.js',
    './app/**/*.js'
]).pipe(order([
    'angular.js', 'angular-route.js', 'ui-bootstrap-tpls', 'angular-cookies.js',
    'query-string.js', 'angular-oauth2.js', 'angular-local-storage.js', '*.js'
])).pipe(ngAnnotate()).pipe(concat('bundle.js'));

gulp.task('js', function() {
    return jsBundle.pipe(gulp.dest('../www/js'));
});

gulp.task('js-min', function() {
    return jsBundle.pipe(uglify()).pipe(gulp.dest('../www/js'));
});