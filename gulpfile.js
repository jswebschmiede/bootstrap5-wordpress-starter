const gulp = require("gulp");
const fancylog = require("fancy-log");
const browserSync = require("browser-sync");
const server = browserSync.create();
const dev_url = "http://best-real-estate.local/";

/**
 * Define all source paths
 */

var paths = {
  styles: {
    src: "./assets/src/scss/**/*.{scss,sass}",
    dest: "./assets/css",
  },
  scripts: {
    src: "./assets/src/js/**/*.js",
    dest: "./assets/js",
  },
};

/**
 * Webpack compilation: http://webpack.js.org, https://github.com/shama/webpack-stream#usage-with-gulp-watch
 *
 * build_js()
 */

function build_js() {
  const compiler = require("webpack");
  const webpackStream = require("webpack-stream");

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
  const sass = require("gulp-sass")(require("sass"));
  const postcss = require("gulp-postcss");
  const sourcemaps = require("gulp-sourcemaps");
  const autoprefixer = require("autoprefixer");
  const cssnano = require("cssnano");

  const plugins = [autoprefixer(), cssnano()];

  return gulp
    .src("assets/src/scss/**/*.{scss,sass}")
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
