/**
 * Created by thangchung on 1/6/14.
 */
(function() {
    var app = window.app || {dir: '/js', deps: ['$', 'bootstrap'], init: function(){}};

    require.config({
        baseUrl: "../bower_components",
        waitSeconds: 15,
        urlArgs : "bust="+new Date().getTime(),
        paths: {
            '$': app.dir + '/jquery/jquery',
            'bootstrap': app.dir + '/bootstrap/dist/js/bootstrap',
            'mazweb': app.dir + '/mazweb/js'
        },
        shim: {
            '$': {exports: '$'},
            'bootstrap': { deps: ['$'] },

            'mazweb/core/jquery.mazweb': { deps: ['$']}
        }
    });

    // Setup and run:
    // 1. Load jQuery and migrate plugin (to avoid shimming every single jquery plugin)
    // 2. Run the app
    require(['$'], function($) {
        if (app.beforeInit) {
            app.beforeInit($);
        }

        require(app.deps, app.init);
    });
})();