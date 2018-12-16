const gulp = require('gulp');
const cleanCSS = require('gulp-clean-css');
const concatCss = require('gulp-concat-css');
const gulpRename = require('gulp-rename');
const gulpConcat = require('gulp-concat');
// const gulpUglify = require('gulp-uglify');
const gulpMinify = require('gulp-minify');

/* Css Files */
const cssFiles = {
    files: [
        'assets/css/animate.css',
        'assets/css/bootstrap.css',
        'assets/css/style.css',
        'assets/css/revslider/revslider-index25.css',
        'assets/css/colors/pink.css',
        'style.css',
    ],
    dest: 'bundle.css'
};

const jsFiles = {
    files: [
        './assets/js/jquery.min.js',
        './assets/js/bootstrap.min.js',
        './assets/js/jquery.hoverIntent.min.js',
        './assets/js/jquery.nicescroll.min.js',
        './assets/js/waypoints.min.js',
        './assets/js/wow.js',
        './assets/js/waypoints-sticky.min.js',
        './assets/js/jquery.debouncedresize.js',
        './assets/js/retina.min.js',
        './assets/js/owl.carousel.min.js',
        './assets/js/jquery.themepunch.tools.min.js',
        './assets/js/jquery.themepunch.revolution.min.js',
        './assets/js/skrollr.min.js',
        './assets/js/jquery.elevateZoom.min.js',
        './assets/js/jquery.bootstrap-touchspin.min.js',
        './assets/js/jquery.nouislider.min.js',
        './assets/js/scripts.js',
        './assets/js/main.js'
    ],
    dest: 'bundle.js'
};

/* 1. Concat css files */
gulp.task('concat-css', function () {
    return gulp.src(cssFiles.files)
        .pipe(concatCss(cssFiles.dest))
        .pipe(gulp.dest('./assets/css'));
});

/* 2. Minify css output file */
gulp.task('minify-css', function () {
    return gulp.src('assets/css/' + cssFiles.dest)
        .pipe(cleanCSS({compatibility: 'ie8'}))
        .pipe(gulpRename({suffix: '.min'}))
        .pipe(gulp.dest('./assets/css/'));
});

/* 3. Concat js files */
gulp.task('concat-js', function () {
    return gulp.src(jsFiles.files)
        .pipe(gulpConcat(jsFiles.dest, {newLine: ';'}))
        .pipe(gulp.dest('./assets/js'));
});

/* 4. Minify js file */
gulp.task('minify-js', function () {
    return gulp.src('assets/js/' + jsFiles.dest)
        .pipe(gulpMinify({
            ext: {
                min: '.min.js'
            }
        }))
        .pipe(gulp.dest('./assets/js'));
});