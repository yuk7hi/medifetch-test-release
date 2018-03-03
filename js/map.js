function initMap2(lati,langi) {
    //example map pin
    var harcourts = {lat: lati, lng: langi};

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

var map, infoWindow;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 6.9271, lng: 79.8612},
          zoom: 16
        });
        infoWindow = new google.maps.InfoWindow;

        // Try HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

            infoWindow.setPosition(pos);
            infoWindow.setContent('Your Location');
            infoWindow.open(map);
            map.setCenter(pos);
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
      }

      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
      }


