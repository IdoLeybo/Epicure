// Generated using webpack-cli https://github.com/webpack/webpack-cli

const path = require("path");
const webpack = require('webpack');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const isProduction = process.env.NODE_ENV == "production";
const stylesHandler = MiniCssExtractPlugin.loader;
var HashPlugin = require('hash-webpack-plugin');
const CleanWebpackPlugin = require('clean-webpack-plugin');
const CompressionPlugin = require('compression-webpack-plugin');
// the path(s) that should be cleaned
let pathsToClean = [
  'dist'
];
// the clean options to use
let cleanOptions = {
  root: path.resolve(__dirname, ''),
  verbose: true,
  dry: false
};

const config = {
  entry: {
    admin: "./js/admin_ajax.js",
    ajax: "./js/ajax.js",
    filters: "./js/filters.js",
    popup: "./js/popup.js",
    quantity: "./js/quantity.js",
    reservationDB: "./js/reservation-DB.js",
    scripts: "./js/scripts.js",
    sweetalert2: "./js/sweetalert2.min.js",
    userDB: "./js/user-DB.js",
  },
  output: {
    filename: '[name].[hash].js',
    path: path.resolve(__dirname, 'dist'),
    publicPath: path.resolve(__dirname, 'resources')
  },
  devServer: {
    open: true,
    host: "localhost",
  },
  plugins: [
    new webpack.ProvidePlugin({
      $: 'jquery',
      jQuery: 'jquery',
      'window.jQuery': 'jquery',
      'window.$': 'jquery',
      IScroll: 'iscroll'
    }),
    new MiniCssExtractPlugin(),
    new HashPlugin({path: './build', fileName: 'version-hash.txt'}),
    new CleanWebpackPlugin(pathsToClean, cleanOptions),
    new CompressionPlugin()
    // Add your plugins here
    // Learn more about plugins from https://webpack.js.org/configuration/plugins/
  ],
  module: {
    rules: [
      {
        test: /\.css$/i,
        use: [stylesHandler, "css-loader"],
      },
      {
        test: /\.(eot|svg|ttf|woff|woff2|png|jpg|gif)$/i,
        type: "asset",
      },

      // Add your rules for custom modules here
      // Learn more about loaders from https://webpack.js.org/loaders/
    ],
  },
};

module.exports = () => {
  if (isProduction) {
    config.mode = "production";
  } else {
    config.mode = "development";
  }
  return config;
};
