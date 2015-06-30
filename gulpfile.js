var gulp = require('gulp'),
    gutil = require('gulp-util'),
    coffee = require('gulp-coffee'),
    browserify = require('gulp-browserify'),
    sass = require('gulp-sass'),
    concat = require('gulp-concat'),
    gulpif = require('gulp-if'),
    uglify = require('gulp-uglify');

var env,
    coffeeSources,
    jsSources,
    sassSources,
    outputDir,
    sassStyle,
    cssSources;

env = process.env.NODE_ENV || 'development';

if(env === 'development'){
    outputDir ='builds/development/';
    sassStyle = 'expanded';
}else{
    outputDir = 'builds/production/';
    sassStyle = 'compressed';
}

coffeeSources = ['js/coffee/*.coffee'];
jsSources = ['js/*.js'];
sassSources =['css/sass/*.scss'];
cssSources = ['css/*.css'];

gulp.task('coffee', function(){
    gulp.src(coffeeSources)
        .pipe(coffee({ bare: true })
            .on('error', gutil.log))
        .pipe(gulp.dest('/js'))
});

gulp.task('js', function(){
    gulp.src(jsSources)
        .pipe(concat('script.js'))
        .pipe(browserify())
        .pipe(gulpif(env === 'production', uglify()))
        .pipe(gulp.dest(''))
})

/*
gulp.task('sass', function(){
    gulp.src(sassSources)
        .pipe(sass().on('error', sass.logError))
        .pipe(concat('sass.css'))
        .pipe(gulp.dest('./css'));
});


gulp.task('css', function(){
    gulp.src(cssSources)
        .pipe(concat('style.css'))
        .pipe(gulp.dest(''));

})
*/
gulp.task('watch', function(){
    gulp.watch(coffeeSources, ['coffee']);
    gulp.watch(jsSources, ['js']);
//    gulp.watch(sassSources, ['sass']);
 //   gulp.watch(cssSources, ['css']);


});

gulp.task('default', ['coffee', 'js']);