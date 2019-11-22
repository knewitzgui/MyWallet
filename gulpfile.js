const gulp        = require('gulp'),
      gutil       = require('gulp-util'),
      uglify      = require('gulp-uglify'),
      favicons    = require('gulp-favicons'),
      imagemin    = require('gulp-imagemin'),
      shell       = require('gulp-shell'),
      htmlmin     = require('gulp-htmlmin');

gulp.task('imagemin', function() {
    gulp.src('public/assets/images/**')
        .pipe(imagemin())
        .pipe(gulp.dest('public/assets/images'));
});

gulp.task('favicons', function() {
    gulp.src('public/assets/icons/favicon.png')
        .pipe(favicons({
            background: '#fff',
            path: '/assets/icons',
            html: 'resources/views/app/inc/favicons.blade.php',
            replace: true
        }))
        .on('error', gutil.log)
        .pipe(gulp.dest('public/assets/icons'));
});

gulp.task('default', shell.task([
    'npm run dev'
]));

gulp.task('watch', shell.task([
    'npm run watch'
]));

gulp.task('production', shell.task([
    'npm run production'
]));

gulp.task('compress', function() {
    var opts = {
        collapseWhitespace:    true,
        removeAttributeQuotes: true,
        removeComments:        true,
        minifyJS:              true
    };

    return gulp.src('./storage/framework/views/*')
               .pipe(htmlmin(opts))
               .pipe(gulp.dest('./storage/framework/views/'));
});