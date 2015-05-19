/**
 * Author: Peder A. Nielsen
 * Date: 11.05.15
 * Company: Making Waves
 */
(function () {
    define(['jquery', 'waypoints', 'sticky'], function ($) {
        "use strict";
         var FrontPageMenu;

        FrontPageMenu = function () {
            return {
                init: function (element) {
                    console.log('hei',$('.front-page-nav')[0], Waypoint);

                    var sticky = new Waypoint.Sticky({

                        element: $('.front-page-nav')[0]
                    })
                }
            };
        };

        return FrontPageMenu;
    });
})();