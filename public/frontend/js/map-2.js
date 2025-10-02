var map, marker, geocoder, searchBox, infoWindow, autocomplete;

async function init(lat, lng) {
    await google.maps.importLibrary("maps");
    await google.maps.importLibrary("marker");
    await google.maps.importLibrary("places");

    var userLocation = { lat: lat, lng: lng };

    map = new google.maps.Map(document.getElementById("map"), {
        center: userLocation,
        mapId: "b705633a629f97f0e3093a4c",
        zoom: 18,
        disableDefaultUI: true,
    });

    // Create custom controls container
    const topControlsContainer = document.createElement('div');
    topControlsContainer.className = 'map-controls-top';

    // Create search box
    const searchContainer = document.createElement('div');
    searchContainer.className = 'search-container';

    const searchInput = document.createElement('input');
    searchInput.type = 'text';
    searchInput.placeholder = 'Search for places...';
    searchInput.className = 'search-input';
    searchContainer.appendChild(searchInput);

    // Create location button with SVG icon
    const locationButton = document.createElement('button');
    locationButton.className = 'location-button';
    locationButton.innerHTML = `
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 2C8.13 2 5 5.13 5 9C5 14.25 12 22 12 22C12 22 19 14.25 19 9C19 5.13 15.87 2 12 2Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M12 12C13.6569 12 15 10.6569 15 9C15 7.34315 13.6569 6 12 6C10.3431 6 9 7.34315 9 9C9 10.6569 10.3431 12 12 12Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    `;
    locationButton.title = 'Find My Location';

    // Add controls to top container
    topControlsContainer.appendChild(searchContainer);
    topControlsContainer.appendChild(locationButton);

    // Add top controls to map
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(topControlsContainer);

    // Create zoom controls container
    const zoomControlsContainer = document.createElement('div');
    zoomControlsContainer.className = 'zoom-controls';

    // Zoom in button
    const zoomInButton = document.createElement('button');
    zoomInButton.className = 'zoom-button zoom-in';
    zoomInButton.innerHTML = `
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 5V19M5 12H19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    `;
    zoomInButton.title = 'Zoom In';

    // Zoom out button
    const zoomOutButton = document.createElement('button');
    zoomOutButton.className = 'zoom-button zoom-out';
    zoomOutButton.innerHTML = `
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M5 12H19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    `;
    zoomOutButton.title = 'Zoom Out';

    // Add zoom buttons to container
    zoomControlsContainer.appendChild(zoomInButton);
    zoomControlsContainer.appendChild(zoomOutButton);

    // Add zoom controls to map
    map.controls[google.maps.ControlPosition.RIGHT_CENTER].push(zoomControlsContainer);

    // Initialize autocomplete for search
    autocomplete = new google.maps.places.PlaceAutocompleteElement(searchInput, {
        fields: ['geometry', 'name', 'formatted_address'],
        types: ['establishment', 'geocode']
    });

    // Handle place selection from search
    autocomplete.addListener('place_changed', () => {
        const place = autocomplete.getPlace();

        if (!place.geometry) {
            console.log('No details available for input: ' + place.name);
            return;
        }

        // Move map to selected place
        if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
        } else {
            map.setCenter(place.geometry.location);
            map.setZoom(18);
        }

        // Update marker position
        marker.position = place.geometry.location;

        // Reverse geocode to get full address
        reverseGeocode(place.geometry.location);

        // Clear search input
        searchInput.value = '';
    });

    // Handle location button click
    locationButton.addEventListener('click', () => {
        findMyLocation();
    });

    // Handle zoom in button click
    zoomInButton.addEventListener('click', () => {
        const currentZoom = map.getZoom();
        map.setZoom(currentZoom + 1);
    });

    // Handle zoom out button click
    zoomOutButton.addEventListener('click', () => {
        const currentZoom = map.getZoom();
        map.setZoom(currentZoom - 1);
    });

    // Create a single InfoWindow instance
    infoWindow = new google.maps.InfoWindow();

    // Create pin styles for different states
    const pinStyles = {
        normal: new google.maps.marker.PinElement({
            background: '#6A6FD5',
            borderColor: '#FFFFFF',
            glyphColor: '#FFFFFF',
            scale: 1,
        }),
        dragging: new google.maps.marker.PinElement({
            background: '#FF6467',
            borderColor: '#FFFFFF',
            glyphColor: '#FFFFFF',
            scale: 1.3,
        })
    };

    marker = new google.maps.marker.AdvancedMarkerElement({
        position: userLocation,
        map: map,
        draggable: true,
        title: 'Drag me to your exact location',
        content: pinStyles.normal.element,
        gmpDraggable: true,
    });

    // Map click to move marker
    map.addListener("click", (event) => {
        marker.position = event.latLng;

        // Reverse geocode when marker is placed
        reverseGeocode(event.latLng);
    });

    // Marker click event
    marker.addListener('click', ({domEvent, latLng}) => {
        const {target} = domEvent;
    });

    // Drag start event - change appearance while dragging
    marker.addListener('dragstart', () => {
        marker.content = pinStyles.dragging.element;

        // Close any open info window when dragging starts
        infoWindow.close();
    });

    // Drag end event - revert appearance and geocode new position
    marker.addListener('dragend', (event) => {
        marker.content = pinStyles.normal.element;
        marker.position = event.latLng;

        // Reverse geocode the new position
        reverseGeocode(event.latLng);
    });

    geocoder = new google.maps.Geocoder();

    // Function to find user's current location
    function findMyLocation() {
        if (navigator.geolocation) {
            locationButton.disabled = true;
            locationButton.innerHTML = `
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 2V6M12 18V22M4 12H8M16 12H20M19.078 19.078L16.25 16.25M19.078 5L16.25 7.828M4.922 19.078L7.75 16.25M4.922 5L7.75 7.828" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            `;
            locationButton.title = 'Finding your location...';

            navigator.geolocation.getCurrentPosition(
                (position) => {
                    const currentLocation = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };

                    // Center map on user's location
                    map.setCenter(currentLocation);
                    map.setZoom(18);

                    // Update marker position
                    marker.position = currentLocation;

                    // Reverse geocode to get address
                    reverseGeocode(currentLocation);

                    // Reset button
                    locationButton.disabled = false;
                    locationButton.innerHTML = `
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2C8.13 2 5 5.13 5 9C5 14.25 12 22 12 22C12 22 19 14.25 19 9C19 5.13 15.87 2 12 2Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12 12C13.6569 12 15 10.6569 15 9C15 7.34315 13.6569 6 12 6C10.3431 6 9 7.34315 9 9C9 10.6569 10.3431 12 12 12Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    `;
                    locationButton.title = 'Find My Location';
                },
                (error) => {
                    console.error('Error getting location:', error);
                    flasher.error('Unable to find your location. Please ensure location services are enabled.');

                    // Reset button
                    locationButton.disabled = false;
                    locationButton.innerHTML = `
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2C8.13 2 5 5.13 5 9C5 14.25 12 22 12 22C12 22 19 14.25 19 9C19 5.13 15.87 2 12 2Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12 12C13.6569 12 15 10.6569 15 9C15 7.34315 13.6569 6 12 6C10.3431 6 9 7.34315 9 9C9 10.6569 10.3431 12 12 12Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    `;
                    locationButton.title = 'Find My Location';
                },
                {
                    enableHighAccuracy: true,
                    timeout: 10000,
                    maximumAge: 60000
                }
            );
        } else {
            flasher.error('Geolocation is not supported by your browser');
        }
    }

    // Function to reverse geocode coordinates to address
    function reverseGeocode(latLng) {
        geocoder.geocode({ location: latLng }, (results, status) => {
            if (status === 'OK') {
                if (results[0]) {
                    infoWindow.close();

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
    }
}

document.addEventListener('DOMContentLoaded', function () {
    $(function () {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                function (position) {
                    init(position.coords.latitude, position.coords.longitude);
                },
                function () {
                    init(37.7749, -122.4194); // San Francisco
                }
            );
        } else {
            flasher.error('Geolocation is not supported by your browser, Enter your address manually');
            init(37.7749, -122.4194);
        }
    });
});
