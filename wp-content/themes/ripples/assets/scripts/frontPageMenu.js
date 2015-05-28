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
                    //console.log('hei FrontPageMenu', Waypoint, Waypoint.Sticky, $('.front-page-nav')[0]);
                    var sticky = new Waypoint.Sticky({
                        element: $('.front-page-nav')[0]
                    });

                    // loop throught the sections and give them an ID. Then add the link to the navigation UL, with the data-name as the displayed text.
                    var num = 1;
                    $(".flexible-sections .section").each(function (index) {
                        var name = $(this).data('name');
                        $(this).attr('id', 'section'+num);
                        var id = $(this).attr('id');
                        //console.log(name);
                        $('.nav-list').append("<li><a href='#" + id + "'>" + name + "</a></li>");
                        num++;
                        //console.log(num);
                    });

                    $('.front-page-nav ul a').on('click', function(event){
                        event.preventDefault();
                        $('.nav-mobile-wrapper').removeClass('visible');
                        var item = $(this).attr('href');
                        $('html, body').animate({
                            scrollTop: $(item).offset().top - 100
                        }, 500);

                    });

                    $('.nav-button').on('click', function() {
                        $('.nav-mobile-wrapper').toggleClass('visible');
                    });

                }
            };
        };

        return FrontPageMenu;
    });
})();