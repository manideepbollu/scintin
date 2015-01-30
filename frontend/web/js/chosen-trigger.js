$('#stops-multiselect').on('change', function(evt, params) {

    //Populating the map with Bus stop information
    if(params.selected)
        var temporaryLocation = pinMap(params.selected);

    if(params.deselected)
        unPinMap(params.deselected);
});

$('#destination-select').on('change', function(evt, params) {
    //Populating the map with Bus stop information
    pinDestination(params.selected);
});