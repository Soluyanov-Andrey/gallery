const path = require('path');
const {merge} = require('webpack-merge');
const common = require('./webpack.common.js');

module.exports = merge(common, {
    mode: 'development',
    devtool:"source-map",
    devServer: {
        //выводим ошибки в браузер
        client: {
            overlay: {
              errors: true,
              warnings: true,
            },
        },
        static: {
            directory: path.join(__dirname, './src'),
          },
          compress: true,
          port: 9074,
          //выводим ошибки в браузер
        
    }

});
