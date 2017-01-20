/*
	# Rund this command to increase the number of files gulp can watch
	#if you got this error Fatal error: watch ENOSPC
	echo fs.inotify.max_user_watches=524288 | sudo tee -a /etc/sysctl.conf && sudo sysctl -p
*/

var gulp = require('gulp');
var uglify = require('gulp-uglify');
var imgmin = require('gulp-imagemin');
var cleanCSS = require('gulp-clean-css');
var less = require('gulp-less');

/*image task*/

gulp.task('images',function(){
	gulp.src('assets/img/*')
		.pipe(imgmin())
		.pipe(gulp.dest('web/images'));
});


/*scripts task*/

gulp.task('scripts',function(){
	gulp.src('assets/js/*.js')
	.pipe(uglify())
	.pipe(gulp.dest('web/js'));
});


/*less task*/

gulp.task('less', function () {
  return gulp.src('assets/less/*.less')
  	.pipe(less())
  	.pipe(cleanCSS({compatibility: 'ie8'}))
    .pipe(gulp.dest('web/css'));
});


/*css task*/
gulp.task('styles', function() {
  return gulp.src('assets/css/*.css')
    .pipe(cleanCSS({compatibility: 'ie8'}))
    .pipe(gulp.dest('web/css'));
});

/*compoments*/

gulp.task('compoments', function() {
  	var bootstrap =  gulp.src('assets/bower_components/bootstrap/dist/css/bootstrap.min.css')
	    .pipe(gulp.dest('web/css'));

  	var animate = gulp.src('assets/bower_components/animate.css/animate.min.css')
	    .pipe(gulp.dest('web/css'));

	var awesome = gulp.src('assets/bower_components/font-awesome/css/font-awesome.min.css')
	    .pipe(gulp.dest('web/css'));

   	var jquery = gulp.src('assets/bower_components/jquery/dist/jquery.min.js')
		.pipe(gulp.dest('web/js'));

	var bootstrapjs = gulp.src('assets/bower_components/bootstrap/dist/js/bootstrap.min.js')
		.pipe(gulp.dest('web/js'));

	var cookiejs = gulp.src('assets/bower_components/cookies-js/dist/cookies.min.js')
		.pipe(gulp.dest('web/js'));

  
});

/*watch project*/
	gulp.task('watch',function(){
		gulp.watch('assets/js/*.js', ['scripts']);
		gulp.watch('assets/css/*.css', ['styles']);
		gulp.watch('assets/less/*.less', ['less']);
	});

	gulp.task('default',['scripts','styles','images','less','compoments']);