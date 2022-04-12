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

/**
 * Webpack compilation: http://webpack.js.org, https://github.com/shama/webpack-stream#usage-with-gulp-watch
 *
 * build_js()
 */

function build_js() {
  return gulp
    .src(paths.scripts.src)
    .pipe(
      webpackStream(
        {
          config: require("./webpack.config.js"),
        },
        compiler
      )
    )
    .pipe(gulp.dest(paths.scripts.dest))
    .pipe(
      server.stream() // Browser Reload
    );
}

/**
 * SASS-CSS compilation: https://www.npmjs.com/package/gulp-sass
 *
 * build_css()
 */

function build_css() {
  const plugins = [autoprefixer(), cssnano()];

  return gulp
    .src(paths.styles.src)
    .pipe(sourcemaps.init())
    .pipe(sass({ includePaths: ["./node_modules"] }).on("error", sass.logError))
    .pipe(postcss(plugins))
    .pipe(sourcemaps.write("./"))
    .pipe(gulp.dest(paths.styles.dest))
    .pipe(
      server.stream() // Browser Reload
    );
}

/**
 * Watch task: Webpack + SASS
 *
 * $ gulp watch
 */

gulp.task("watch", function () {
  // Modify "dev_url" constant and uncomment "server.init()" to use browser sync
  server.init({
    proxy: dev_url,
  });

  gulp.watch(["*.php", "./**/*.php"]).on("change", server.reload);
  gulp.watch([paths.scripts.src], build_js);
  gulp.watch([paths.styles.src], build_css);
});
