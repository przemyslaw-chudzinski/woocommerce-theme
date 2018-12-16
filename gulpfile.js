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
        'assets/css/vendor/animate.css',
        'assets/css/vendor/bootstrap.css',
        'assets/css/vendor/style.css',
        'assets/css/vendor/revslider/revslider-index25.css',
        'assets/css/vendor/colors/pink.css',
        'vendor/style.css',
    ],
    dest: 'bundle.css'
};

const jsFiles = {
    files: [
        './assets/js/vendor/jquery.min.js',
        './assets/js/vendor/bootstrap.min.js',
        './assets/js/vendor/jquery.hoverIntent.min.js',
        './assets/js/vendor/jquery.nicescroll.min.js',
        './assets/js/vendor/waypoints.min.js',
        './assets/js/vendor/wow.js',
        './assets/js/vendor/waypoints-sticky.min.js',
        './assets/js/vendor/jquery.debouncedresize.js',
        './assets/js/vendor/retina.min.js',
        './assets/js/vendor/owl.carousel.min.js',
        './assets/js/vendor/jquery.themepunch.tools.min.js',
        './assets/js/vendor/jquery.themepunch.revolution.min.js',
        './assets/js/vendor/skrollr.min.js',
        './assets/js/vendor/jquery.elevateZoom.min.js',
        './assets/js/vendor/jquery.bootstrap-touchspin.min.js',
        './assets/js/vendor/jquery.nouislider.min.js',
        './assets/js/vendor/scripts.js',
        './assets/js/vendor/main.js'
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

gulp.task('watch:js', function () {
    gulp.watch(['concat-js', 'minify-js']);
});