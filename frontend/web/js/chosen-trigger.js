$('#stops-multiselect').on('change', function(evt, params) {

    //Populating the map with Bus stop information
    if(params.selected)
        pinMap(params.selected);

    if(params.deselected)
        unPinMap(params.deselected);
});