$(document).ready(function () {

    $(function () {
        // bxslider
        $('#bxslider').bxSlider({
            auto: true,
            captions: true,
            adaptiveHeight: true,
            useCSS: false,
            touchEnabled: true,
            speed: 500
        });

        //datepicker
        $("#datepicker").datepicker();

        //wysiwyg
        CKEDITOR.replace('editor');

        //Countdown
        $('[data-countdown]').each(function () {
            var $this = $(this), finalDate = $(this).data('countdown');
            $this.countdown(finalDate, function (event) {
                $this.html(event.strftime('%D day(s) %H:%M:%S'));
            });
        });

        $("#thumbnails").yoxview({
            backgroundColor: 'Blue',
            playDelay: 5000
        });

    });




    $(function () {

        // just a super-simple JS demo

        var demoHeaderBox;

        // simple demo to show create something via javascript on the page
        if ($('#javascript-header-demo-box').length !== 0) {
            demoHeaderBox = $('#javascript-header-demo-box');
            demoHeaderBox
                    .hide()
                    .text('Hello from JavaScript! This line has been added by public/js/application.js')
                    .css('color', 'green')
                    .fadeIn('slow');
        }

        // if #javascript-ajax-button exists
        if ($('#javascript-ajax-button').length !== 0) {

            $('#javascript-ajax-button').on('click', function () {

                // send an ajax-request to this URL: current-server.com/songs/ajaxGetStats
                // "url" is defined in views/_templates/footer.php
                $.ajax(url + "/auctions/getAuctions")
                        .done(function (result) {
                            // this will be executed if the ajax-call was successful
                            // here we get the feedback from the ajax-call (result) and show it in #javascript-ajax-result-box
                            $('#javascript-ajax-result-box').html(result);
                        })
                        .fail(function () {
                            // this will be executed if the ajax-call had failed
                        })
                        .always(function () {
                            // this will ALWAYS be executed, regardless if the ajax-call was success or not
                        });
            });
        }

    });






});
