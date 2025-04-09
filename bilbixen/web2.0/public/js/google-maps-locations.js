$(document).ready(function () {

    var map = null;
    function initialize()
    {

        var mapOptions =
                {
                    zoom: 12,
                    center: new google.maps.LatLng(55.40375599999999, 10.402370000000019)//center over dublin
                };

        map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
        loadXMLFile();
    }


    function loadXMLFile() {
        var filename = 'http://sde.websupport.dk/projekter/praktiskweb/DWP-Bilbixen/public/api/departments.php';
        $.ajax({
            type: "GET",
            url: filename,
            dataType: "xml",
            success: parseXML,
            error: onXMLLoadFailed
        });

        function onXMLLoadFailed() {
            alert("An Error has occurred.");
        }

        function parseXML(xml) {
            var bounds = new google.maps.LatLngBounds();
            $(xml).find("marker").each(function () {
                //Read the name, address, latitude and longitude for each Marker
                var nme = $(this).find('name').text();
                var address = $(this).find('address').text();
                var lat = $(this).find('lat').text();
                var lng = $(this).find('lng').text();
                var markerCoords = new google.maps.LatLng(parseFloat(lat),
                        parseFloat(lng));
                bounds.extend(markerCoords);
                // Initialise the inforWindow
                var infoWindow = new google.maps.InfoWindow({
                    content: nme + '<br>' + address
                });

                var marker = new google.maps.Marker({position: markerCoords, clickable: true, map: map, title: nme, infowindow: infoWindow});
                google.maps.event.addListener(marker, 'click', function () {
                    infoWindow.open(map, marker);
                });
            });
            map.fitBounds(bounds);
        }
    }

    google.maps.event.addDomListener(window, 'load', initialize);
    // Display our info window when the marker is clicked

});