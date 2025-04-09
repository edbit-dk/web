jQuery(document).ready(function () {

//    Require scripts function
    function require(script) {
        $.ajax({
            url: script,
            dataType: "script",
            async: false, // <-- This is the key
            success: function () {
                // all good...
            },
            error: function () {
                throw new Error("Could not load script " + script);
            }
        });
    }

    // Require alle needed scripts
    require("js/bootstrap.js");
    require("js/plugins/bootstrap-autohiding-navbar/jquery.bootstrap-autohidingnavbar.min.js");
    require("js/plugins/wow.min.js");
    //require("js/plugins/scrollreveal.min.js");
    require("js/ie10-viewport-bug-workaround.js");


    //------------------ Custom scripts -----------------//

    //Animate CSS
    //window.sr = new scrollReveal();
     new WOW().init();
    

    //Autohide menu
    $(".navbar-fixed-top").autoHidingNavbar({
        // see next for specifications
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
        });
        document.querySelector("#info").classList.toggle("flip");
    });


    //Bootstrap js
    $('#popup1').popover({
        html: true,
        trigger: "hover"
    });
    $('#popup2').popover({
        html: true,
        trigger: "hover"
    });


//document.querySelector("#info").classList.toggle("flip");


});