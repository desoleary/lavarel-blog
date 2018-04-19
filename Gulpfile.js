const gulp         = require('gulp');
const sass         = require('gulp-sass');
const autoprefixer = require('gulp-autoprefixer');

gulp.task('css', function () {
   gulp.src('resources/assets/sass/blog.scss')
       .pipe(sass())
       .pipe(gulp.dest('public/css'));
});

gulp.task('watch', function () {
    gulp.watch('resources/assets/sass/**/*.scss', ['css']);
});

gulp.task('default', ['watch']);