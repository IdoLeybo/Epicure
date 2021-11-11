// webpack.config.js
/**
 * Webpack configuration.
 */
const path = require( 'path' );
const ExtractTextPlugin = require('extract-text-webpack-plugin');
var HashPlugin = require('hash-webpack-plugin');
const CompressionPlugin = require('compression-webpack-plugin');
const MiniCssExtractPlugin = require( 'mini-css-extract-plugin' );
const OptimizeCssAssetsPlugin = require( 'optimize-css-assets-webpack-plugin' );
const { CleanWebpackPlugin } = require( 'clean-webpack-plugin' );
const UglifyJsPlugin = require( 'uglifyjs-webpack-plugin' );
// JS Directory path.
const JS_DIR = path.resolve( __dirname, 'src/js' );
let pathsToClean = [
    'dist'
];
let cleanOptions = {
    root: path.resolve(__dirname, ''),
    verbose: true,
    dry: false
};
const plugins = [
    new CleanWebpackPlugin( {pathsToClean}, cleanOptions ),
    new ExtractTextPlugin({
        filename: '[name].css',
    }),
    new HashPlugin({path: './build', fileName: 'version-hash.txt'}),
    new CompressionPlugin()
];
const rules = [
    {
        test: /\.js$/,
        include: [ JS_DIR ],
        exclude: /node_modules/,
        use: 'babel-loader'
    },
    {
        test: /\.scss$/,
        exclude: /node_modules/,
        use: [
            MiniCssExtractPlugin.loader,
            'css-loader',
        ]
    },
    {
        test: /\.(png|jpg|svg|jpeg|gif|ico)$/,
        use: {
            loader: 'file-loader',
            options: {
                name: '[path][name].[ext]',
                publicPath: 'production' === process.env.NODE_ENV ? '../' : '../../'
            }
        }
    },
];


module.exports = env  => {

    return {

        entry: {
            main: './js/scripts.js',
            sweetalert: './js/sweetalert2.min.js',
            adminside: './js/admin_ajax.js',
            filters: './js/filters.js'
        },
        output: {
            filename: '[name].[hash].js',
            path: path.resolve(__dirname, 'dist'),
            publicPath: path.resolve(__dirname, 'resources')
        },
        mode: 'development',
        module: {
            rules: rules,
        },
        optimization: {
            minimizer: [
                new OptimizeCssAssetsPlugin( {} ),
                new UglifyJsPlugin( {
                    cache: true,
                    parallel: true,
                    sourceMap: false
                } )
            ]
        },
        plugins: plugins,
        watch: false,
        node: {
            fs: 'empty'
        },
        externals: {
            jquery: 'jQuery'
        }
    }
};