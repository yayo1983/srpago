function init_map() {
    let latitude = document.querySelector('#latitude').dataset.user;
    let longitud = document.querySelector('#longitud').dataset.user;
    let localization = document.querySelector('#localization').dataset.user;
    var myOptions = {
        zoom: 24,
        center: new google.maps.LatLng(latitude, longitud),
        mapTypeId: google.maps.MapTypeId.ROADMAP
        // mapTypeId: google.maps.MapTypeId.SATELLITE
    };
    map = new google.maps.Map(document.getElementById("mapa"), myOptions);
    marker = new google.maps.Marker({
        map: map,
        position: new google.maps.LatLng(latitude, longitud)
    });

    infowindow = new google.maps.InfoWindow({
        content: localization

    });
    google.maps.event.addListener(marker, "click", function () {

        infowindow.open(map, marker);
    });

    infowindow.open(map, marker);
}

google.maps.event.addDomListener(window, 'load', init_map);
