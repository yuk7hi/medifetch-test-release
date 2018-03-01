function initMap() {
    //example map pin
    var harcourts = {lat: 6.851422, lng: 79.865049};

    //assign the Google maps object on the html doc where ID = map
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 16,
        center: harcourts
    });

    //set up a marker on the example map pin
    var marker = new google.maps.Marker({
        position: harcourts,
        map: map,
        icon: 'icons/pharmacy.png'
    });
}
