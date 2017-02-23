var gulp = require('gulp'),
        sass = require('gulp-sass'),
        uglify = require('gulp-uglify'),
        // inlinesource = require('gulp-inline-source'),
        jade = require('gulp-jade');

gulp.task('jade', function() {
        gulp.src('gulp/*.jade')
        .pipe(jade({pretty: true}))
        .pipe(gulp.dest('./raw'));

        gulp.src('gulp/**/*.jade')
        .pipe(jade({pretty: false}))
        .pipe(gulp.dest(''));
});


gulp.task('sass', function () {
        return gulp.src('gulp/css/*.scss')
        .pipe(sass().on('error', sass.logError))
        // .pipe(gulp.dest('./css')).pipe(csso());
        .pipe(gulp.dest('css'));
});

gulp.task('js', function () {
        return gulp.src(['gulp/js/*.js'], ['js'])
        .pipe(uglify())
        .pipe(gulp.dest('./js'));
});

// gulp.task('inline-code', function () {
//     return gulp.src('raw')
//         .pipe(inlinesource(compress: false))
//         .pipe(gulp.dest(''));


// });

gulp.task('watch', function() {
        gulp.watch('./gulp/**/*.jade', ['jade']);
        gulp.watch('./gulp/css/**/*.scss', ['sass']);
        gulp.watch('./gulp/js/**/*.js', ['js']);
        // gulp.watch('./raw/*.html', ['inline-code']);

});

gulp.task('default', ['watch']);


/*
sudo npm install --save-dev gulp-install  gulp-jade
sudo npm install --save-dev gulp-install gulp-minify
sudo npm install --save-dev gulp-install gulp-jade
sudo npm install --save-dev gulp-install  gulp-sass
sudo npm install --save-dev gulp-install gulp-csso
sudo npm install --save-dev gulp-install gulp-uglify
sudo npm install --save-dev gulp-install sprity
sudo npm install --save-dev gulp-install gulp-if

npm install gulp-tmtsprite --save
*/
