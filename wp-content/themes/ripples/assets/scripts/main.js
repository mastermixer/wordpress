require.config({
    baseUrl: '/wp-content/themes/ripples/assets/scripts',
    paths: {
        'jquery': '//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min',
        'waypoints': 'vendor/noframework.waypoints',
        'sticky': 'vendor/sticky'
    }
    //,
    // shim: {
    //     'waypoints': {
    //         deps: ['jquery']
    //     },
    //     'sticky': {
    //         deps: ['jquery', 'waypoints']
    //     }

    // }

});

require(['app'], function (App) {
    new App().init();
});
