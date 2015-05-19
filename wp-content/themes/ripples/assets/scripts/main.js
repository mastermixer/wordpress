require.config({
    baseUrl: '/wp-content/themes/ripples/assets/scripts',
    paths: {
        'jquery': '//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min',
        'waypoints': '../../bower_components/waypoints/lib/noframework.waypoints',
        'sticky': '../../bower_components/waypoints/lib/shortcuts/sticky'
    },
    shim: {
        'sticky': {
            deps: ['jquery']
        }

    }

});

require(['app'], function (App) {
    new App().init();
});
