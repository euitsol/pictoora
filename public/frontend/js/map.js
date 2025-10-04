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

    // Create custom controls container (jQuery)
    const $topControlsContainer = $('<div class="map-controls-top"></div>');

    // Create search box (jQuery) - migrate to PlaceAutocompleteElement, keep existing classes
    const $searchContainer = $('<div class="search-container"></div>');
    const $placeAutocomplete = $(`
        <gmp-place-autocomplete
            class="search-input"
            placeholder="Search for places...">
        </gmp-place-autocomplete>
    `);
    $searchContainer.append($placeAutocomplete);

    // Create location button (jQuery)
    const $locationButton = $(`
        <button class="location-button" title="Find My Location">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 2C8.13 2 5 5.13 5 9C5 14.25 12 22 12 22C12 22 19 14.25 19 9C19 5.13 15.87 2 12 2Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M12 12C13.6569 12 15 10.6569 15 9C15 7.34315 13.6569 6 12 6C10.3431 6 9 7.34315 9 9C9 10.6569 10.3431 12 12 12Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>
    `);

    // Assemble top controls
    $topControlsContainer.append($searchContainer).append($locationButton);
    map.controls[google.maps.ControlPosition.TOP_LEFT].push($topControlsContainer[0]);

    // Create zoom controls (jQuery)
    const $zoomControlsContainer = $('<div class="zoom-controls"></div>');
    const $zoomInButton = $(`
        <button class="zoom-button zoom-in" title="Zoom In">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 5V19M5 12H19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>
    `);
    const $zoomOutButton = $(`
        <button class="zoom-button zoom-out" title="Zoom Out">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M5 12H19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>
    `);
    $zoomControlsContainer.append($zoomInButton).append($zoomOutButton);
    map.controls[google.maps.ControlPosition.RIGHT_CENTER].push($zoomControlsContainer[0]);

    // Single InfoWindow
    infoWindow = new google.maps.InfoWindow();

    // Pin styles
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
    map.addListener("click", function (event) {
        marker.position = event.latLng;
        reverseGeocode(event.latLng);
    });

    // Marker events
    marker.addListener('click', function () {});
    marker.addListener('dragstart', function () {
        marker.content = pinStyles.dragging.element;
        infoWindow.close();
    });
    marker.addListener('dragend', function (event) {
        marker.content = pinStyles.normal.element;
        marker.position = event.latLng;
        reverseGeocode(event.latLng);
    });

    // Handle place selection from new web component (current API)
    $placeAutocomplete[0].addEventListener('gmp-select', async function (event) {
        try {
            const prediction = event.placePrediction;
            if (!prediction || typeof prediction.toPlace !== 'function') return;

            const place = prediction.toPlace();

            // Explicitly fetch the fields you need
            await place.fetchFields({
                fields: ["formattedAddress", "location", "displayName"]
            });

            if (!place.location) return;

            // Handle lat/lng whether it's a LatLng object or plain numbers
            let selectedLatLng = null;
            if (typeof place.location.lat === 'function') {
                selectedLatLng = place.location; // already LatLngLiteral
            } else {
                selectedLatLng = new google.maps.LatLng(
                    place.location.lat,
                    place.location.lng
                );
            }

            map.setCenter(selectedLatLng);
            map.setZoom(18);

            if (!marker) {
                marker = new google.maps.Marker({
                    map,
                    position: selectedLatLng,
                });
            } else {
                marker.position = selectedLatLng;
            }

            reverseGeocode(selectedLatLng);

            try { $placeAutocomplete[0].value = ''; } catch (e) {}
        } catch (err) {
            console.error('Place selection failed:', err);
        }
    });

    // Button events (jQuery)
    $locationButton.on('click', function () {
        findMyLocation();
    });
    $zoomInButton.on('click', function () {
        const currentZoom = map.getZoom();
        map.setZoom(currentZoom + 1);
    });
    $zoomOutButton.on('click', function () {
        const currentZoom = map.getZoom();
        map.setZoom(currentZoom - 1);
    });
    geocoder = new google.maps.Geocoder();

    // Find user's current location
    function findMyLocation() {
        if (navigator.geolocation) {
            $locationButton.prop('disabled', true).attr('title', 'Finding your location...').html(`
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 2V6M12 18V22M4 12H8M16 12H20M19.078 19.078L16.25 16.25M19.078 5L16.25 7.828M4.922 19.078L7.75 16.25M4.922 5L7.75 7.828" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            `);

            navigator.geolocation.getCurrentPosition(
                function (position) {
                    const currentLocation = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };
                    map.setCenter(currentLocation);
                    map.setZoom(18);
                    marker.position = currentLocation;
                    reverseGeocode(currentLocation);
                    $locationButton.prop('disabled', false).attr('title', 'Find My Location').html(`
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2C8.13 2 5 5.13 5 9C5 14.25 12 22 12 22C12 22 19 14.25 19 9C19 5.13 15.87 2 12 2Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12 12C13.6569 12 15 10.6569 15 9C15 7.34315 13.6569 6 12 6C10.3431 6 9 7.34315 9 9C9 10.6569 10.3431 12 12 12Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    `);
                },
                function (error) {
                    console.error('Error getting location:', error);
                    $locationButton.prop('disabled', false).attr('title', 'Find My Location').html(`
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2C8.13 2 5 5.13 5 9C5 14.25 12 22 12 22C12 22 19 14.25 19 9C19 5.13 15.87 2 12 2Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12 12C13.6569 12 15 10.6569 15 9C15 7.34315 13.6569 6 12 6C10.3431 6 9 7.34315 9 9C9 10.6569 10.3431 12 12 12Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    `);
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

    // Reverse geocode coordinates to address
    function reverseGeocode(latLng) {
        geocoder.geocode({ location: latLng }, function (results, status) {
            if (status === 'OK') {
                if (results[0]) {
                    infoWindow.close();
                    const customContent = createInfoWindowContent(results[0].formatted_address);
                    infoWindow.setContent(customContent);
                    infoWindow.open(map, marker);
                    autofillAddressForm(results[0]);
                }
            } else {
                console.log('Geocoder failed due to: ' + status);
                infoWindow.close();
            }
        });
    }

    function createInfoWindowContent(address) {
        return `
           <div class="rounded-xl shadow-md overflow-hidden min-h-20">
                <div class="bg-gradient-to-br from-indigo-500 to-indigo-300 text-white px-4 py-3 flex items-center gap-1">
                    <div>
                    <h3 class="m-0 text-base font-semibold leading-tight">Selected Location</h3>
                    <small class="text-xs hidden md:block">Drag/Click to adjust position</small>
                    </div>
                </div>
                <div class="bg-white p-2 md:p-4">
                    <p class="text-gray-700 text-[10px] md:text-sm break-words">
                    ${address}
                    </p>
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

        addressComponents.forEach(function (component) {
            const types = component.types;
            if (types.includes('locality')) {
                city = component.long_name;
            } else if (types.includes('administrative_area_level_1')) {
                state = component.long_name;
            } else if (types.includes('postal_code')) {
                postalCode = component.long_name;
            }
        });

        const $fullAddressInput = $('#fullAddress');
        const $cityInput = $('#city');
        const $postalCodeInput = $('#postalCode');
        const $stateInput = $('#state');

        if ($fullAddressInput) $fullAddressInput.val(fullAddress);
        if ($cityInput) $cityInput.val(city);
        if ($postalCodeInput) $postalCodeInput.val(postalCode);
        if ($stateInput) $stateInput.val(state);
    }
}

document.addEventListener('DOMContentLoaded', function () {
    $(document).ready(function () {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                function (position) {
                    init(position.coords.latitude, position.coords.longitude);
                },
                function () {
                    init(37.7749, -122.4194);
                }
            );
        } else {
            flasher.error('Geolocation is not supported by your browser, Enter your address manually');
            init(37.7749, -122.4194);
        }
    });
});
