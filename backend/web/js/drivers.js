
/* 
 * 
 */

'use strict';


/*----------------------------------------------------------
 * NEAREST DRIVERS
 *   gets origin coordinates from user and output json with nearest drivers
 * ---------------------------------------------------------*/

var map;
var orig_lat;
var orig_lng;


var input = ( document.querySelector('#origin-input'));
var autocomplete = new google.maps.places.Autocomplete(input);


autocomplete.addListener('place_changed', function() {

//  infowindow.close();
//  marker.setVisible(false);
    var place = autocomplete.getPlace();

    if (!place.geometry) {
      window.alert("No details available for input: '" + place.name + "'");
      return;
    }
  
    orig_lat = place.geometry.location.lat();
    orig_lng = place.geometry.location.lng();
    
    //sendOrigin(orig_lat, orig_lng);
    console.log( 'geometry assign' );
    

    
});

input.addEventListener("keypress", function(e) {
    
    if(e.keyCode == 13){
        e.preventDefault();
    }

});



    document.querySelector('#coordinates').addEventListener('submit', function(e) {
        console.log( 'ssubmit' );
        
        
        e.preventDefault();

        document.querySelector('.icon-load').style.display = 'block';

        var formData = new FormData(document.querySelector('#coordinates'));

        formData.append('orig_lat', orig_lat);
        formData.append('orig_lng', orig_lng);

        console.log( 'lat: ' + orig_lat + '   ' + 'lng: ' + orig_lng);

        var xhttp = new XMLHttpRequest();

        //console.log( formData );

        xhttp.open('POST', 'drivers', true);

        xhttp.onload = function(oEvent) {
            if (xhttp.status == 200) {

                var drivers = JSON.parse(this.responseText);
                
                showDrivers(drivers);
                //showOnMap(drivers);

                //console.log(this.responseText);

                document.querySelector('.icon-load').style.display = 'none';

            } else {
                throw new Error('Error! ajax request not sent!');
            }
        };

        /*-- for sequrity in yii2 --*/
        var token = $('meta[name=csrf-token]').attr('content');
        xhttp.setRequestHeader('X-CSRF-Token', token);
        xhttp.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        /*-- /for sequrity in yii2 --*/

        xhttp.send(formData);
        

    });
    
    

function showDrivers(drivers) {
    console.log( drivers );
    var outputDiv = document.getElementById('output');
            outputDiv.innerHTML = '';
    
    for (var i = 0; i < drivers.length; i++) {
        
        outputDiv.innerHTML +=  'Distance: ' + drivers[i].road_distance + '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
                + 'Time: ' + drivers[i].duration + '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
                + 'Name: ' + drivers[i].name  + '<br>';
        
    }
    
}


function initMap() {
    

    
    map = new google.maps.Map(document.getElementById('map'), {
        mapTypeControl: true,
        center: {lat: 39.87601942, lng: -101.29394531},
        zoom: 5
    });

}

initMap();


//function showOnMap(drivers) {
//        /*------map------*/
//        console.log( drivers );
//        var bounds = new google.maps.LatLngBounds;
//        var markersArray = [];
//    
//    var geocoder = new google.maps.Geocoder;
//    
//    var originList = drivers.origins_addresses;
//            var destinationList = drivers.destination_addresses;
////            var outputDiv = document.getElementById('output');
////            outputDiv.innerHTML = '';
//            deleteMarkers(markersArray);
//
//            var showGeocodedAddressOnMap = function(asDestination) {
//              var icon = asDestination ? destinationIcon : originIcon;
//              return function(results, status) {
//                if (status === 'OK') {
//                  map.fitBounds(bounds.extend(results[0].geometry.location));
//                  markersArray.push(new google.maps.Marker({
//                    map: map,
//                    position: results[0].geometry.location,
//                    icon: icon
//                  }));
//                } else {
//                  alert('Geocode was not successful due to: ' + status);
//                }
//              };
//            };
//
//            for (var i = 0; i < originList.length; i++) {
//              var results = response.rows[i].elements;
//              geocoder.geocode({'address': originList[i]},
//                  showGeocodedAddressOnMap(false));
//              for (var j = 0; j < results.length; j++) {
//                geocoder.geocode({'address': destinationList[j]},
//                    showGeocodedAddressOnMap(true));
////                outputDiv.innerHTML += originList[i] + ' to ' + destinationList[j] +
////                    ': ' + results[j].distance.text + ' in ' +
////                    results[j].duration.text + '<br>';
//              }
//            }
//            
//                  function deleteMarkers(markersArray) {
//        for (var i = 0; i < markersArray.length; i++) {
//          markersArray[i].setMap(null);
//        }
//        markersArray = [];
//      }
//    
//    /*------/map------*/
//}

