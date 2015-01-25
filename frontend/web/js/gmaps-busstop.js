//Map variable is here
var map;

//school Marker is here
var schoolMarker;

//create the infowindow for general use
var infoWindow = new google.maps.InfoWindow();

//Temporary Variables
var dps = [13.117346, 77.641570];
var stoneHill = [13.170170, 77.595624];
var cgi = [12.948347, 77.689351];

//create Bus Stop Marker
var createBusStop = new google.maps.Marker({
    draggable: true,
    animation: google.maps.Animation.DROP,
});

//School Location
var schoolLocation = new google.maps.LatLng(cgi[0], cgi[1]);

//AutoComplete field - Bus Stop name field
var autoComplete = new google.maps.places.Autocomplete(document.getElementById('busstops-stop_name'));

//Assigning the latLng fields to variables
var stopLat = document.getElementById("busstops-lat_coords");
var stopLng = document.getElementById("busstops-lon_coords");

//Geocode variable
var geoCoder = new google.maps.Geocoder();

google.maps.event.addDomListener(window, "load", initialize);





//Functions here
function initialize() {

    //Define the map styling with the map properties here
    var mapProp = {
        center: schoolLocation,
        zoom: 15,
        panControl: true,
        panControlOptions: {
            position:google.maps.ControlPosition.LEFT_BOTTOM,
        },
        zoomControl: true,
        zoomControlOptions: {
            style:google.maps.ZoomControlStyle.SMALL,
            position:google.maps.ControlPosition.LEFT_BOTTOM,
        },
        streetViewControl: false,
        mapTypeControl: false,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    //Create the map object here
    map = new google.maps.Map(document.getElementById("map"), mapProp);

    //create the school marker at the center location
    schoolMarker = new google.maps.Marker({
        position: schoolLocation,
        draggable: false,
        icon: "img/university.png",
        animation: google.maps.Animation.DROP,
        map: map
    });

    //If latlng coordinates are already in the database (In case of Update)
    if(stopLat.value && stopLng.value)
        setPlaceMarker(new google.maps.LatLng(stopLat.value, stopLng.value));

    //Show the infowindow when someone clicks on the school marker
    google.maps.event.addListener(schoolMarker, 'click', function() {
        infoWindow.setContent("School <b>Base Location</b>");
        infoWindow.open(map,schoolMarker);
    });

    //Drops the red marker (New Bus stop) for the first time on click
    google.maps.event.addListener(map, 'click', function(event){
        setPlaceMarker(event.latLng);
        updateCoords();
        updateDistance();
        reverseGeoCode();
    });

    //Updates the coordinates as you drag the marker
    google.maps.event.addListener(createBusStop, 'dragend', function(){
        updateCoords();
        updateDistance();
        reverseGeoCode();
    });

    google.maps.event.addListener(autoComplete, 'place_changed', onPlaceChanged);

}

//This function drop a marker for the autocompleted place
function onPlaceChanged(){
    var place = autoComplete.getPlace();
    if (place.geometry) {
        setPlaceMarker(place.geometry.location);
        updateCoords();
        updateDistance();
    }
}

//Drops the marker on the choosen place
function setPlaceMarker(location){
    map.panTo(location);
    map.setZoom(16);
    createBusStop.setPosition(location);
    createBusStop.setMap(map);
}

//Reverse GeoCoding
function reverseGeoCode(){
    var tempLocation = new google.maps.LatLng(stopLat.value, stopLng.value);
    geoCoder.geocode({'latLng': tempLocation}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            document.getElementById('busstops-stop_name').value = results[1].formatted_address;
        } else {
            alert('Geocoder failed due to: ' + status);
        }
    });
}

function updateCoords(){
    stopLat.value = createBusStop.getPosition().lat();
    stopLng.value = createBusStop.getPosition().lng();
}

function updateDistance(){
    document.getElementById("busstops-distance").value = (google.maps.geometry.spherical.computeDistanceBetween(createBusStop.getPosition(), schoolLocation)/1000).toFixed(2);
}