import gulp, { dest, lastRun, parallel, series, src, watch } from "gulp";
import dartSass from "sass";
import gulpSass from "gulp-sass";
import autoprefixer from "autoprefixer";
import sourcemaps from "gulp-sourcemaps";
import postcss from "gulp-postcss";
import cssnano from "cssnano";
import compiler from "webpack";
import webpackStream from "webpack-stream";
import browserSync from "browser-sync";

const dev_url = "yourlocal.dev";
const sass = gulpSass(dartSass);
const server = browserSync.create();

/**
 * Define all source paths
 */

var paths = {
  styles: {
    src: "./assets/src/scss/**/*.{scss,sass}",
    dest: "./assets/dist/css",
  },
  scripts: {
    src: "./assets/src/js/**/*.js",
    dest: "./assets/dist/js",
  },
};

// JS Task
const jsTask = () => {
  return src(paths.scripts.src)
    .pipe(
      webpackStream(
        {
          config: require("./webpack.config.js"),
        },
        compiler
      )
    )
    .pipe(dest(paths.scripts.dest))
    .pipe(
      server.stream() // Browser Reload
    );
};

// Sass Task
const scssTask = () => {
  return src(paths.styles.src)
    .pipe(sourcemaps.init())
    .pipe(sass({ includePaths: ["./node_modules"] }).on("error", sass.logError))
    .pipe(postcss([autoprefixer(), cssnano()]))
    .pipe(sourcemaps.write("."))
    .pipe(dest(paths.styles.dest))
    .pipe(
      server.stream() // Browser Reload
    );
};

// Watch Task
const watchTask = () => {
  server.init({
    proxy: dev_url,
  });

  watch(["*.php", "./**/*.php"]).on("change", server.reload);
  watch([paths.styles.src, paths.scripts.src], parallel(scssTask, jsTask));
};

// Default Task
exports.default = series(parallel(scssTask, jsTask), watchTask);
