module.exports = {
    transpileDependencies: ["@vueform"],
    chainWebpack: config => {
        // Add the rule to load css files for datatables.net-bs5
        config.module
          .rule('datatables-css')
          .test(/\.css$/)
          .include.add(/node_modules\/datatables\.net-bs5/).end()
          .use('style-loader').loader('style-loader').end()
          .use('css-loader').loader('css-loader').end();
    },
    // resolve: {
    //     extensions: ['.js', '.ts', '.jsx', '.tsx', '.vue'],
    // },
    // server: {
    //     port: 4000
    // },
    // module: {
    //     rules: [
    //         {
    //             test: /\.js$/,
    //             loader: 'babel-loader',
    //             exclude: /node_modules/,
    //         },
    //         {
    //             test: /\.vue$/,
    //             loader: 'vue-loader',
    //         },
    //         {
    //             test: /\.tsx?$/,
    //             loader: 'ts-loader',
    //             exclude: /node_modules/,
    //             options: {
    //                 appendTsSuffixTo: [/\.vue$/],
    //             },
    //         },
    //         // Other loaders...
    //     ],
    // },
}