var gulp = require('gulp'),
  eslint = require('gulp-eslint'),
  uglify = require('gulp-uglify'),
  concat = require('gulp-concat'),
  sass = require('gulp-sass'),
  rename = require('gulp-rename'),
  stylelint = require('gulp-stylelint'),
  autoprefixer = require('gulp-autoprefixer'),
  imagemin = require('gulp-imagemin');

// Function that catch errors and will therefore prevent gulp to exit the watch task as long as an on listener is set.
function swallowError(error) {
  console.log(error.messageFormatted);
}

gulp.task('watch', function () {
  gulp.watch('resources/stylesheets/**/*.scss', ['stylelint', 'css']);
  gulp.watch('resources/javascripts/**/*.js', ['eslint', 'uglify']);
  gulp.watch('resources/images/*.svg', ['imagemin']);
});

gulp.task('eslint', function () {
  return gulp.src(['resources/javascripts/**/*.js'])
    .pipe(eslint())
    .pipe(eslint.format())
    .pipe(eslint.failAfterError());
});

gulp.task('uglify', function () {
  gulp
    .src([
      'resources/javascripts/**/*.js'
    ])
    .pipe(concat('app.min.js'))
    .pipe(uglify({
      mangle: true,
      compress: true
    }))
    .on('error', swallowError)
    .pipe(gulp.dest('public/javascripts/'));

  gulp
    .src([
      'resources/javascripts/**/*.js'
    ])
    .pipe(concat('corporate.min.js'))
    .pipe(uglify({
      mangle: true,
      compress: true
    }))
    .on('error', swallowError)
    .pipe(gulp.dest('public/javascripts/'));
});

gulp.task('html5shiv', function () {
  return gulp
    .src([
      'node_modules/html5shiv/dist/html5shiv.min.js'
    ])
    .pipe(gulp.dest('public/javascripts/'));
});

gulp.task('stylelint', function () {
  return gulp
    .src('resources/stylesheets/**/*.scss')
    .pipe(stylelint({
      reporters: [{
        formatter: 'string',
        console: true
      }]
    }));
});

gulp.task('css', function () {
  return gulp
    .src('resources/stylesheets/app.scss')
    .pipe(sass({
      outputStyle: 'compressed'
    }))
    .on('error', swallowError)
    .pipe(autoprefixer({
      browsers: ['last 4 versions', '> 5%']
    }))
    .pipe(rename('app.min.css'))
    .pipe(gulp.dest('public/stylesheets/'));
});

gulp.task('imagemin', function () {
  return gulp
    .src('resources/images/**/*.svg')
    .pipe(imagemin([
      imagemin.optipng({optimizationLevel: 3}),
      imagemin.svgo({plugins: [{removeViewBox: false}]})
    ]))
    .pipe(gulp.dest('public/images/'));
});

gulp.task('default', [
  'eslint', 'uglify', 'html5shiv', 'css', 'imagemin'
]);
