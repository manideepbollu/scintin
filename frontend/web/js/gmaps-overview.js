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
    var overviewMap = new google.maps.Map(document.getElementById("map"), mapOverviewProp);

    //create the school marker at the center location
    var marker = new google.maps.Marker({
        position: latlng,
        draggable: false,
        icon: "img/university.png",
        animation: google.maps.Animation.DROP
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


}

google.maps.event.addDomListener(window, "load", initialize);