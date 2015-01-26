var overviewMap;

function initialize() {

    var dps = [13.117346, 77.641570];
    var stoneHill = [13.170170, 77.595624];
    var cgi = [12.948347, 77.689351];

    //Center the map as per school coordinates
    var latlng = new google.maps.LatLng(cgi[0], cgi[1]);

    //Define the map styling with the map preperties here
    var mapOverviewProp = {
        center: latlng,
        zoom: 14,
        disableDefaultUI: true,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    //Create the map object here
    overviewMap = new google.maps.Map(document.getElementById("map"), mapOverviewProp);

    //create the school marker at the center location
    var marker = new google.maps.Marker({
        position: latlng,
        draggable: false,
        icon: "img/university.png",
        animation: google.maps.Animation.DROP,
    });

    //Show the marker on the map
    marker.setMap(overviewMap);

    //create the infowindow for school marker
    var infowindow = new google.maps.InfoWindow({
        content:"School <b>Base Location</b>",
    });

    //Show the infowindow when someone clicks on the school marker
    google.maps.event.addListener(marker, 'click', function() {
        infowindow.open(overviewMap,marker);
    });

    //Populating the map with Bus stop information
    populateMap();
}

google.maps.event.addDomListener(window, "load", initialize);

//Populating map with the available Json Data
function populateMap(){

    // Fire off the request to busstops/json-data [Controller/Action]
    request = $.ajax({
        url: "index.php?r=busstops/json-data",
        type: "get",
        dataType: "json",
    });

    // Callback handler that will be called on success
    request.done(function (response, textStatus, jqXHR){
        // Log a message to the console
        jsonData = response;
        for (var i = 0; i < jsonData.length; i++) {
            var data = jsonData[i],
                latLng = new google.maps.LatLng(data.lat_coords, data.lon_coords);

            // Placing a marker on the map as per Json Data
            var oldMarker = new google.maps.Marker({
                position: latLng,
                draggable: false,
                map: overviewMap,
                icon: {
                    path: google.maps.SymbolPath.BACKWARD_CLOSED_ARROW,
                    strokeColor: "green",
                    scale: 5,
                },
                animation: google.maps.Animation.DROP,
                title: data.stop_name,
            });
        }
    });

    // Callback handler that will be called on failure
    request.fail(function (jqXHR, textStatus, errorThrown){
        // Log the error to the console
        console.error(
            "The following error occurred: "+
            textStatus, errorThrown
        );
    });

}