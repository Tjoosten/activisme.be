'use strict';

var gulp 		= require('gulp-help')(require('gulp'));
var sass 		= require('gulp-sass');
var sourcemaps	= require('gulp-sourcemaps');

// COMMAND: production
gulp.task('production', 'Generate all the needed production envrionment assets.', function () {
    gulp.start('images:copy', 'javascript:copy', 'sass:prod');
});

// COMMAND: gulp sass:dev
gulp.task('sass:dev', 'Compile the css files for your dev environment.', function () {
	return gulp.src('./resources/sass/*.scss')
		.pipe(sourcemaps.init())
		.pipe(gulp.sync().on('error', sass.logError))
		.pipe(sourcemaps.write())
		.pipe(gulp.dest('./assets/css'));
});

// COMMAND: sass:prod
gulp.task('sass:prod', 'Compile the css files for your production environment', function () {
	return gulp.src('./resources/sass/*.scss')
		.pipe(sourcemaps.init())
		.pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
		.pipe(sourcemaps.write())
		.pipe(gulp.dest('./assets/css'))
});

// COMMAND: images:copy
gulp.task('images:copy', 'Copy the images to your assets directory.', function () {
	return gulp.src('./resources/images/*.jpg')
		.pipe(gulp.dest('./assets/images'));
});

// COMMAND: javascript:copy
gulp.task('javascript:copy', 'Copy the javascript files to your assets directory.', function () {
	gulp.src('./resources/javascript/*.js')
		.pipe(gulp.dest('./assets/js'));
});

// COMMAND: sass:watch
gulp.task('sass:watch', 'Watch on the scss file for changes during development.', function () {
	gulp.watch('./resources/sass/*.scss', ['sass:dev']);
});

// Command: images:watch
gulp.task('images:watch', 'Watch for changes in de resources/images directory.', function () {
    gulp.watch('./resources/images/', ['images:copy']);
});

// COMMAND: javacript:watch
gulp.task('javascript:watch', 'Watch on the javascripts for changes during development.', function () {
	gulp.watch('./resources/javascript/*.js', ['javascript:copy']);
});

// Command: watch
gulp.task('watch', 'Run all the watchers in the task runner.', function () {
    gulp.watch('./resources/sass/*.scss', ['sass:dev']);
    gulp.watch('./resources/images/', ['images:copy']);
    gulp.watch('./resources/javascript/*.js', ['javascript:copy']);
});
