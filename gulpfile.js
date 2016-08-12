var gulp = require('gulp');
var cleanCSS = require('gulp-clean-css');
var jsmin = require('gulp-jsmin');

//css minification
gulp.task('minify-css', function () {
    return gulp.src('public/css/development/*.css')
               .pipe(cleanCSS({debug: true}, function(details) {
            console.log(details.name + ': ' + details.stats.originalSize);
            console.log(details.name + ': ' + details.stats.minifiedSize);
        }))
               .pipe(gulp.dest('public/css/production/'));
});

//js minification
gulp.task('minify-js', function () {
    gulp.src('public/js/development/*.js')
        .pipe(jsmin())
        .pipe(gulp.dest('public/js/production/'));
});

gulp.task('default',function(){
    /*
    * run the default task through gulp command
    * */
   gulp.run('minify-css');
   gulp.run('minify-js');
    /*
    * watcher added so if there's a change
    * in any css within development directory
    * gulp'll watch & fire minification
    * */
   gulp.watch('public/css/development/*.css',function(){
        gulp.run('minify-css')
    });
    /*
     * watcher added so if there's a change
     * in any js within development directory
     * gulp'll watch & fire minification
     * */
    gulp.watch('public/js/development/*.js',function(){
        gulp.run('minify-js')
    });
});
