'use struct';

var gulp = require('gulp-help')(require('gulp'));
var sass = require('gulp-sass');

/**
 * COMMAND:
 */
gulp.task('sass', 'Compile the sass css.', function () {
  return gulp.src('./resources/sass/*.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(gulp.dest('./css'));
});

/**
 * COMMAND:
 */
gulp.task('sass:watch', 'Watch for file changes.', function () {
  gulp.watch('./resources/sass/*.scss', ['sass']);
});
