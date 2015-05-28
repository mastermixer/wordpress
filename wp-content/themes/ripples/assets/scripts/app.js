(function () {
    define(['jquery','frontPageMenu'], function ($, FrontPageMenu) {
        "use strict";
        var App;

        App = function () {
            return {
                init: function () {
                    console.log('Hello App!');
                    var frontPageMenu = new FrontPageMenu().init();
                }
            };
        };

        return App;

    });
    
})();