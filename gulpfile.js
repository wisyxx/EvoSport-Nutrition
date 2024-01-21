const { src, dest, watch, parallel } = require('gulp');
const postcss = require('gulp-postcss');
const sourcemaps = require('gulp-sourcemaps');
const terser = require('gulp-terser-js');
const imagemin = require('gulp-imagemin'); // Minify images
const notify = require('gulp-notify');
const cache = require('gulp-cache');
const webp = require('gulp-webp');

const paths = {
  scss: 'src/scss/**/*.scss',
  js: 'src/js/**/*.js',
  images: 'src/img/**/*',
};

function javascript() {
  return src(paths.js)
    .pipe(terser())
    .pipe(sourcemaps.write('.'))
    .pipe(dest('public/build/js'));
}

function images() {
  return src(paths.images)
    .pipe(cache(imagemin({ optimizationLevel: 3 })))
    .pipe(dest('public/build/img'))
    .pipe(notify({ message: 'Imagen Completada' }));
}

function webpVersion() {
  return src(paths.images)
    .pipe(webp())
    .pipe(dest('public/build/img'))
    .pipe(notify({ message: 'Imagen Completada' }));
}

function watchFiles() {
  watch(paths.js, javascript);
  watch(paths.images, images);
  watch(paths.images, webpVersion);
}

exports.watchFiles = watchFiles;
exports.default = parallel(javascript, images, webpVersion, watchFiles);
