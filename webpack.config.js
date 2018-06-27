var Encore = require('@symfony/webpack-encore');

Encore
    .setOutputPath('public/build/')
    .setPublicPath('/build')
    .cleanupOutputBeforeBuild()
    //.autoProvidejQuery()
    .enableSassLoader()
    .enableVersioning(false)
    //.createSharedEntry('js/common', ['jquery'])
    /*.addEntry('js/app', './assets/js/app.js')
    .addEntry('js/login', './assets/js/login.js')
    .addEntry('js/admin', './assets/js/admin.js')
    .addEntry('js/search', './assets/js/search.js')
    .addStyleEntry('css/app', ['./assets/scss/app.scss'])
    .addStyleEntry('css/signin', ['./assets/scss/signin.scss'])
    .addStyleEntry('css/admin', ['./assets/scss/admin.scss'])*/
    .addStyleEntry('css/common', ['./assets/scss/common.scss'])
;

module.exports = Encore.getWebpackConfig();
