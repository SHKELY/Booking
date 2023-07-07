<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel='stylesheet' type='text/css' href='https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.5.0/maps/maps.css'>
<script onload="initializeMap();" src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.5.0/maps/maps-web.min.js" defer></script>

<style>
    #map {
        height: 500px;
        width: 100%;
    }
    
    @media only screen and (max-width: 767px) {
        #map {
            height: 300px;
        }
    }
    
    #marker {
        background-image: url('/wp-content/uploads/2021/04/copywriter-logo-dark.svg');
        background-size: cover;
        width: 30px;
        height: 30px;
    }
    
    body {
        align-items: center;
        justify-content: center;
    }
</style>

<body>
<?php
include('include/header.php');
include('navigation.php');
?>
<div class="row mb-3 mt-2">
<div class="input-group">
                <input type="text" class="form-control bg-light border-2 small"  id="searchInput" placeholder="Search for your location" aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary mybg" type="button" id="search-button">
                                <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
    </div>
    </div>
    <div id='map'></div>
   
    <script>
        function initializeMap() {
            var api_key = '3IfzJthFDhW911lWrrIn814NqyN6RTev';
            var destination = {
                lat: -6.14455,
                lng: 39.20875
            };
            var zoomLevel = 14;
            var yourAddress = 'Maruhubi, Zanzibar';

            var map = tt.map({
                container: 'map',
                key: api_key,
                center: destination,
                zoom: zoomLevel
            });

            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var userLocation = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };

                    map.setCenter(userLocation);

                    var directions = new tt.services.Routing({
                        key: api_key
                    });

                    directions.route({
                            locations: [userLocation, destination],
                            instructionsType: 'text'
                        })
                        .go()
                        .then(function(result) {
                            var route = result.routes[0];
                            var geojson = route.toGeoJson();
                            var routeLayer = tt.geoJson(geojson, {
                                color: 'black',
                                opacity: 0.8,
                                weight: 6
                            }).addTo(map);
                        })
                        .catch(function(error) {
                            console.log(error);
                        });
                });
            }

            var marker = new tt.Marker().setLngLat(destination).addTo(map);

            var popupOffsets = {
                top: [0, 0],
                bottom: [0, -70],
                'bottom-right': [0, -70],
                'bottom-left': [0, -70],
                left: [25, -35],
                right: [-25, -35]
            }

            var popup = new tt.Popup({
                offset: popupOffsets
            }).setHTML(yourAddress);
            marker.setPopup(popup).togglePopup();
        }
    </script>
    <?php
 include('include/footer.php');
 include('include/scripts.php');
?>
</body>

</html>