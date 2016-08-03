var gulp = require('gulp');
var cleanCss = require('gulp-clean-css');

gulp.task('minify-css', function () {
    return gulp.src('app/Views/css/development/*.css')
               .pipe(cleanCss({compatibility:'ie8'})
               .pipe(gulp.dest('app/Views/css/production/')));
});

gulp.task('default',function(){
   //gulp.run('minify-css');
   gulp.watch('app/Views/css/development/*.css',function(){
        gulp.run('minify-css')
    });
});
