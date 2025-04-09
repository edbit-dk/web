jQuery(document).ready(function () {

//    $(this).scrollTop(0);
    $(window).on('beforeunload', function () {
        $(window).scrollTop(0);
    });


    //Scroll to location
    $(function () {
        $('a[href*=#]:not([href=#])').click(function () {
            if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname) {

                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1500);
                    return false;
                }
            }
        })
    });

    (function ($) {

        'use strict';

        window.sr = new scrollReveal({
            reset: true,
            move: '50px',
            mobile: true
        });

    })();


});