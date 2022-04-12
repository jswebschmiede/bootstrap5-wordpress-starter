const path = require("path"),
  webpack = require("webpack");

module.exports = {
  context: path.resolve(__dirname, "assets"),
  mode: "development",
  entry: {
    main: ["./src/js/main.js"],
  },
  output: {
    path: path.resolve(__dirname, "assets/dist/js"),
    filename: "[name].bundle.js",
  },
  // externals: {
  // 	jquery: 'jQuery'
  // },
  plugins: [
    new webpack.ProvidePlugin({
      $: "jquery",
      jQuery: "jquery",
    }),
  ],
  devtool: "source-map",
  watch: true,
};
