
/* 
 * 
 */

'use strict';

/*----------------------------------------------------------
 * NEAREST DRIVERS
 *   gets origin coordinates from user and output json with nearest drivers
 * ---------------------------------------------------------*/



document.querySelector("#coordinates").addEventListener("submit", function (e) {

    var fd = new FormData(document.querySelector("#coordinates"));
    //console.log(fd);

    $.ajax({
        url: 'drivers',
        data: fd,
        success: function (res) {

            var driversParsed = JSON.parse(res);

            initMap(driversParsed);

            //console.log(  );

            //console.log(Array.isArray(jsonDrivers));
        },
        type: 'POST',
        processData: false, // tell jQuery not to process the data
        contentType: false, // tell jQuery not to set contentType
        error: function () {
            throw new Error('err!!!');
        }
    });
    e.preventDefault();
});


function initMap(drivers) {

    var bounds = new google.maps.LatLngBounds;
    var markersArray = [];
    
    console.log( drivers );




    var destinations = [
        {lat: 47.911529, lng: -121.606417},
        {lat: 48.072560, lng: -121.689606},
        {lat: 48.092397, lng: -122.576537},
        {lat: 48.950253, lng: -122.459792},
    ];

    var origin1 = {lat: 37.99616268, lng: -91.93359375};
    //var origin2 = 'Greenwich, England';
    //var destinationA = 'Stockholm, Sweden';
    var destinationB = {lat: 53.61857936, lng: -113.53271484};

//    var destinationIcon = 'https://chart.googleapis.com/chart?' +
//            'chst=d_map_pin_letter&chld=D|FF0000|000000';
//    var originIcon = 'https://chart.googleapis.com/chart?' +
//            'chst=d_map_pin_letter&chld=O|FFFF00|000000';
//    var map = new google.maps.Map(document.getElementById('map'), {
//        center: {lat: 55.53, lng: 9.4},
//        zoom: 10
//    });
    var geocoder = new google.maps.Geocoder;

    var service = new google.maps.DistanceMatrixService;
    
    for ( var x = 0; x < drivers[1].length; x++ ) {
        
            service.getDistanceMatrix({
        origins: [{ lat: parseFloat(drivers[0].orig_lat), lng: parseFloat(drivers[0].orig_lng) }],
        destinations: [{ lat: parseFloat(drivers[1][x].lat), lng: parseFloat(drivers[1][x].lng) }],
        travelMode: 'DRIVING',
        unitSystem: google.maps.UnitSystem.METRIC,
        avoidHighways: false,
        avoidTolls: false
    }, function (response, status) {
        if (status !== 'OK') {
            alert('Error was: ' + status);
        } else {
            var originList = response.originAddresses;
            var destinationList = response.destinationAddresses;
            var outputDiv = document.getElementById('output');
            outputDiv.innerHTML = '';
//            deleteMarkers(markersArray);

//            var showGeocodedAddressOnMap = function (asDestination) {
//                var icon = asDestination ? destinationIcon : originIcon;
//                return function (results, status) {
//                    if (status === 'OK') {
//                        map.fitBounds(bounds.extend(results[0].geometry.location));
//                        markersArray.push(new google.maps.Marker({
//                            map: map,
//                            position: results[0].geometry.location,
//                            icon: icon
//                        }));
//                    } else {
//                        alert('Geocode was not successful due to: ' + status);
//                    }
//                };
//            };
            //console.log(google.maps.UnitSystem);
            //console.log(originList);


            for (var i = 0; i < originList.length; i++) {

                var results = response.rows[i].elements;





//                geocoder.geocode({'address': originList[i]},
//                        showGeocodedAddressOnMap(false));

                for (var j = 0; j < results.length; j++) {

                    //console.log(destinationList[j]);

//                    geocoder.geocode({'address': destinationList[j]},
//                            showGeocodedAddressOnMap(true));

                    //console.log(results[j].duration);

                    outputDiv.innerHTML += originList[i] + ' to ' + destinationList[j] +
                            ': ' + results[j].distance.text + ' in ' +
                            results[j].duration.text + '<br>';
                }
            }
        }
    });
        
    }
    
    

}

//function deleteMarkers(markersArray) {
//    for (var i = 0; i < markersArray.length; i++) {
//        markersArray[i].setMap(null);
//    }
//    markersArray = [];
//}


