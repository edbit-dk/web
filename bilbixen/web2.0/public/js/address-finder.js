$(document).ready(function () {

    (function ($) {
        $.fn.delayKeyup = function (callback, ms) {
            var timer = 0;
            $(this).keyup(function () {
                clearTimeout(timer);
                timer = setTimeout(callback, ms);
            });
            return $(this);
        };
    })(jQuery);

    $('#from').attr('readonly', true);
    $('#postnr').delayKeyup(function () {

        $('#process').addClass('process');

        var postnr = $('#postnr').val();

        var jqXHR = $.post('http://sde.websupport.dk/projekter/praktiskweb/DWP-Bilbixen/public/api/address-finder.php', {postFromClient: postnr}, function (data) {

            $('#process').removeClass('process');

            if (data === '0') {
                alert('Postnummer eksisterer desværre ikke. Indtast selv addresse eller brug "find min position".');
                $('#from').removeAttr('readonly');
                $('#from').focus();
            } else {
                $('#from').val(data);
            }

        }).fail(function () {

            alert('Lookup was not possible!');
            $('#process').removeClass('process');
            $('#from').removeAttr('readonly');
            $('#from').val('');
            $('#from').focus();
            return;
        });
    }, 2000);

});