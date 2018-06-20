let Encore = require('@symfony/webpack-encore');

Encore
    .setOutputPath('public/build/')
    .setPublicPath('/build')
    .cleanupOutputBeforeBuild()
    .autoProvidejQuery()
    .autoProvideVariables({
        "window.Bloodhound": require.resolve('bloodhound-js'),
        "jQuery.tagsinput": "bootstrap-tagsinput"
    })
    .enableSassLoader()
    .enableVersioning(false)
    .createSharedEntry('js/common', ['jquery'])
    .addEntry('js/landing', './assets/js/landing.js')
    .addEntry('js/login', './assets/js/login.js')
    .addEntry('js/admin', './assets/js/admin.js')
    .addStyleEntry('css/landing', ['./assets/scss/landing.scss'])
    //.addStyleEntry('css/login', ['./assets/scss/login.scss'])
    .addStyleEntry('css/admin', ['./assets/scss/admin.scss'])
;

module.exports = Encore.getWebpackConfig();
