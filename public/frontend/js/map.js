var map, marker, geocoder, searchBox, infoWindow;

async function initMap(lat, lng) {
    await google.maps.importLibrary("maps");
    const { AdvancedMarkerElement, PinElement } = await google.maps.importLibrary("marker");

    var userLocation = { lat: lat, lng: lng };

    const map = new google.maps.Map(document.getElementById("map"), {
        center: userLocation,
        mapId: "b705633a629f97f0e3093a4c",
        zoom: 18,
        disableDefaultUI: true,
    });

    // Create a single InfoWindow instance
    infoWindow = new google.maps.InfoWindow();

    // Create pin styles for different states
    const pinStyles = {
        normal: new PinElement({
            background: '#6A6FD5',
            borderColor: '#FFFFFF',
            glyphColor: '#FFFFFF',
            scale: 1,
        }),
        dragging: new PinElement({
            background: '#FF6467',
            borderColor: '#FFFFFF',
            glyphColor: '#FFFFFF',
            scale: 1.3,
        })
    };

    const marker = new AdvancedMarkerElement({
        position: userLocation,
        map: map,
        draggable: true,
        title: 'Drag me to your exact location',
        content: pinStyles.normal.element,
        gmpDraggable: true,
    });

    // Map click to move marker
    map.addListener("click", (event) => {
        console.log(event);
        marker.position = event.latLng;
        console.log(marker.position);

        // Reverse geocode when marker is placed
        reverseGeocode(event.latLng);
    });

    // Marker click event
    marker.addListener('click', ({domEvent, latLng}) => {
        const {target} = domEvent;
        console.log('Marker clicked at:', latLng);
    });

    // Drag start event - change appearance while dragging
    marker.addListener('dragstart', () => {
        console.log('Started dragging marker');
        marker.content = pinStyles.dragging.element;

        // Close any open info window when dragging starts
        infoWindow.close();
    });

    // Drag end event - revert appearance and geocode new position
    marker.addListener('dragend', (event) => {
        console.log('Finished dragging marker to:', event.latLng);
        marker.content = pinStyles.normal.element;
        marker.position = event.latLng;

        // Reverse geocode the new position
        reverseGeocode(event.latLng);
    });

    geocoder = new google.maps.Geocoder();

    // Function to reverse geocode coordinates to address
    function reverseGeocode(latLng) {
        geocoder.geocode({ location: latLng }, (results, status) => {
            if (status === 'OK') {
                if (results[0]) {
                    console.log('Address:', results[0].formatted_address);

                    // Close any existing info window before opening a new one
                    infoWindow.close();

                    // Update and open the single InfoWindow instance
                    // Create custom content for the InfoWindow
                    const customContent = createInfoWindowContent(results[0].formatted_address);

                    // Update and open the single InfoWindow instance
                    infoWindow.setContent(customContent);
                    infoWindow.open(map, marker);

                    autofillAddressForm(results[0]);
                }
            } else {
                console.log('Geocoder failed due to: ' + status);

                // Close info window if geocoding fails
                infoWindow.close();
            }
        });
    }

    function createInfoWindowContent(address) {
        return `
            <div class="custom-info-window">
                <div class="info-window-header">
                    <h3>Selected Location</h3> <br>
                    <small>Drag/Click to adjust position</small>
                </div>
                <div class="info-window-body">
                    <p class="address">${address}</p>
                </div>
            </div>
        `;
    }

    function autofillAddressForm(geocodeResult) {
        const addressComponents = geocodeResult.address_components;
        let city = '';
        let state = '';
        let postalCode = '';
        let fullAddress = geocodeResult.formatted_address;

        // Extract address components
        addressComponents.forEach(component => {
            const types = component.types;

            if (types.includes('locality')) {
                city = component.long_name;
            } else if (types.includes('administrative_area_level_1')) {
                state = component.long_name;
            } else if (types.includes('postal_code')) {
                postalCode = component.long_name;
            }
        });

        // Fill the form fields
        const fullAddressInput = $('#fullAddress');
        const cityInput = $('#city');
        const postalCodeInput = $('#postalCode');
        const stateInput = $('#state');

        if (fullAddressInput) fullAddressInput.val(fullAddress);
        if (cityInput) cityInput.val(city);
        if (postalCodeInput) postalCodeInput.val(postalCode);
        if (stateInput) stateInput.val(state);

        console.log('Autofilled address form:', { fullAddress, city, postalCode, state });
    }
}

document.addEventListener('DOMContentLoaded', function () {
    if (navigator.geolocation) {
        console.log('Geolocation is supported by your browser');

        navigator.geolocation.getCurrentPosition(
            function (position) {
                console.log('Latitude: ' + position.coords.latitude);
                console.log('Longitude: ' + position.coords.longitude);
                initMap(position.coords.latitude, position.coords.longitude);
            },
            function () {
                console.log('User denied geolocation');
                // fallback to a default if user denies
                initMap(37.7749, -122.4194); // San Francisco
            }
        );
    } else {
        console.log('Geolocation is not supported by your browser');
        // browser doesn't support geolocation
        initMap(37.7749, -122.4194);
    }
});
