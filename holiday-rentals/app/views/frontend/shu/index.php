<!DOCTYPE html>
<html>
    <head>
        <title>Simple click event</title>
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
        <meta charset="utf-8">
        <style>
            /*      html, body {
                    height: 100%;
                    margin: 0;
                    padding: 0;
                  }*/
            #map {
                height: 300px;
                width: 300px;
            }
        </style>
        <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?signed_in=true&callback=initMap" async defer></script>
    </head>
    <body>
        <div id="map"></div>
        <script>
            function initMap() {
                var center = {lat: 55.883313, lng: 10.6045166};

                var nordby = {lat: 55.9636029, lng: 10.5524741};
                var maarup = {lat: 55.9461119, lng: 10.5660354};
                var langoer = {lat: 55.9119542, lng: 10.6421142};
                var stavns = {lat: 55.8977200, lng: 10.6129690};
                var toftebjerg = {lat: 55.8790370, lng: 10.6102450};
                var besser = {lat: 55.8632107, lng: 10.6407720};
                var onsbjerg = {lat: 55.850599, lng: 10.57323};
                var tranebjerg = {lat: 55.8324640, lng: 10.5921560};
                var ballen = {lat: 55.8324640, lng: 10.5921560};

                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 10,
                    center: center
                });


                var nordby_marker = new google.maps.Marker({
                    position: nordby,
                    map: map,
                    title: 'Nordby'
                });

                var maarup_marker = new google.maps.Marker({
                    position: maarup,
                    map: map,
                    title: 'Mårup'
                });

                var langoer_marker = new google.maps.Marker({
                    position: langoer,
                    map: map,
                    title: 'Langør'
                });

                var stavns_marker = new google.maps.Marker({
                    position: stavns,
                    map: map,
                    title: 'Stavns'
                });

                var toftebjerg_marker = new google.maps.Marker({
                    position: toftebjerg,
                    map: map,
                    title: 'Toftebjerg'
                });

                var besser_marker = new google.maps.Marker({
                    position: besser,
                    map: map,
                    title: 'Besser'
                });

                var onsbjerg_marker = new google.maps.Marker({
                    position: onsbjerg,
                    map: map,
                    title: 'Onsbjerg'
                });
                
               var tranebjerg_marker = new google.maps.Marker({
                    position: tranebjerg,
                    map: map,
                    title: 'Tranebjerg'
                });

                function geocodePosition(pos) {
                    var geocoder = new google.maps.Geocoder;
                    geocoder.geocode({
                        latLng: pos
                    }, function (responses) {
                        if (responses && responses.length > 0) {

                            returnAddress(responses[0].formatted_address);

                        } else {
                            return 'Cannot determine address at this location.';
                        }
                    });
                }

                function returnAddress(response) {

                    var address = response.substring(0, response.indexOf(' '));
                    address = address.replace(/[0-9]/g, '');
                    if (address === 'Dyrskuepladsen') {
                        address = 'Onsbjerg';
                    }
                    if (address === 'Stauns') {
                        address = 'Stavns';
                    }
                    if(address === 'Møllebakkevej'){
                        address = 'Tranebjerg';
                    }

                    var input = $('#by');
                    input.val(address);
                }


                nordby_marker.addListener('click', function () {
                    geocodePosition(nordby);

                });
                maarup_marker.addListener('click', function () {
                    geocodePosition(maarup);

                });
                langoer_marker.addListener('click', function () {
                    geocodePosition(langoer);

                });
                stavns_marker.addListener('click', function () {
                    geocodePosition(stavns);

                });
                toftebjerg_marker.addListener('click', function () {
                    geocodePosition(toftebjerg);

                });
                besser_marker.addListener('click', function () {
                    geocodePosition(besser);

                });
                onsbjerg_marker.addListener('click', function () {
                    geocodePosition(onsbjerg);

                });
                  tranebjerg_marker.addListener('click', function () {
                    geocodePosition(tranebjerg);

                });



            }



        </script>

        <input id="by" type="text">
    </body>
</html>