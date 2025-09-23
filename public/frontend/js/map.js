var map, marker, geocoder, searchBox;

function initMap(lat, lng) {
    var userLocation = { lat: lat, lng: lng };

    map = new google.maps.Map(document.getElementById("map"), {
        center: userLocation,
        zoom: 14,
    });

    marker = new google.maps.Marker({
        position: userLocation,
        map: map,
        draggable: true,
    });

    geocoder = new google.maps.Geocoder();

    // Places Autocomplete
    // searchBox = new google.maps.places.SearchBox($("#searchInput")[0]);

    // searchBox.addListener("places_changed", function () {
    //     var places = searchBox.getPlaces();
    //     if (!places.length) return;

    //     var place = places[0];
    //     if (!place.geometry) return;

    //     map.setCenter(place.geometry.location);
    //     marker.setPosition(place.geometry.location);

    //     updateForm(
    //         place.geometry.location.lat(),
    //         place.geometry.location.lng(),
    //         place.formatted_address
    //     );
    // });

    // Update on marker drag
    google.maps.event.addListener(marker, "dragend", function () {
        var pos = marker.getPosition();
        geocoder.geocode({ location: pos }, function (results, status) {
            if (status === "OK" && results[0]) {
                updateForm(pos.lat(), pos.lng(), results[0].formatted_address);
            }
        });
    });

    updateForm(lat, lng, "");
}

function updateForm(lat, lng, address) {
    $("#latitude").val(lat);
    $("#longitude").val(lng);
    $("#address").val(address);
}

document.addEventListener('DOMContentLoaded', function () {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
            function (position) {
                initMap(position.coords.latitude, position.coords.longitude);
            },
            function () {
                // fallback to a default if user denies
                initMap(37.7749, -122.4194); // San Francisco
            }
        );
    } else {
        // browser doesn't support geolocation
        initMap(37.7749, -122.4194);
    }
});
