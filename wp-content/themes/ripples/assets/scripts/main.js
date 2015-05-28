require.config({
    baseUrl: '/wp-content/themes/ripples/assets/scripts',
    paths: {
        'jquery': '//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min',
        'waypoints': '../../bower_components/waypoints/lib/jquery.waypoints',
        'sticky': '../../bower_components/waypoints/lib/shortcuts/sticky'
    },
    shim: {
        'waypoints': {
            deps: ['jquery']
        },
        'sticky': {
            deps: ['jquery', 'waypoints']
        }

    }

});

require(['app'], function (App) {
    new App().init();
});
