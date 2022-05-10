const mix = require('laravel-mix');

const fs = require('fs')

const getFiles = path => {
    const files = []
    for (const file of fs.readdirSync(path)) {
        const fullPath = path + '/' + file
        if(fs.lstatSync(fullPath).isDirectory())
            getFiles(fullPath).forEach(x => files.push(file + '/' + x))
        else files.push(file)
    }
    return files
}

mix.webpackConfig({
    devtool: 'eval-source-map'
});

//compile admin lte css
mix.styles([
    'node_modules/bootstrap/dist/css/bootstrap.min.css',
    'node_modules/admin-lte/dist/css/adminlte.css',
    'node_modules/admin-lte/plugins/fontawesome-free/css/all.min.css',
    'node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css',    
    'node_modules/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css',
    'node_modules/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css'
], 'public/css/vendor.css');


mix.minify('public/css/vendor.css');

//compile webfonts
mix.copy('node_modules/@fortawesome/fontawesome-free/webfonts/*', "public/webfonts");


//compile all js
const AppScripts = "resources/js/";
getFiles(AppScripts).forEach(v => {
    mix.js(AppScripts+v, 'public/js/'+v).sourceMaps();
});

//compile css files
const css = "resources/css/";
getFiles(css).forEach(v => {
    mix.css(css+v, 'public/css/'+v);
    mix.minify('public/css/'+v);

});


mix.version();

mix.disableNotifications();


