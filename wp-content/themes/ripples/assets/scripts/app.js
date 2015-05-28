(function () {
    define(['jquery','frontPageMenu'], function ($, FrontPageMenu) {
        "use strict";
        var App;

        App = function () {
            return {
                init: function () {
                    console.log('Hello App!');
                    var frontPageMenu = new FrontPageMenu().init();

                    $('.nav-button').on('click', function() {
                        console.log('hello world');
                        $('.nav-list').toggleClass('visible');
                    });
                }
            };
        };

        return App;

    });
    
})();