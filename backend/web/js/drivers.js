
/* 
 * 
 */

'use strict';


/*----------------------------------------------------------
 * NEAREST DRIVERS
 *   gets origin coordinates from user and output json with nearest drivers
 * ---------------------------------------------------------*/

var map;



var origin_input = ( document.querySelector('#origin-input'));
var autocomplete = new google.maps.places.Autocomplete(origin_input);

//console.log( autocomplete.addListener );

//origin_input.addEventListener('keypress', function(e) {
//    if(e.keyCode == 13) {
//      event.preventDefault();
//      return false;
//    }
//});



autocomplete.addListener('place_changed', function() {
console.log( 'assign' );
//  infowindow.close();
//  marker.setVisible(false);

    //document.querySelector('#coordinates').submit();
    
    var place = autocomplete.getPlace();
        console.log( autocomplete.getPlace() );
        
        var orig_lat = place.geometry.location.lat();
    var orig_lng = place.geometry.location.lng();
    aaa(orig_lat, orig_lng);

    

    /*---------------- sending origins to server -------------------------*/


    
    /*---------------- /sending origins to server ---------------------*/
    
});

document.querySelector('#search_rad').addEventListener('keypress', function(e) {

        if(e.keyCode == 13) {
              var place = autocomplete.getPlace();
        console.log( autocomplete.getPlace() );
        
        var orig_lat = place.geometry.location.lat();
    var orig_lng = place.geometry.location.lng();
    aaa(orig_lat, orig_lng);
    }

});


function aaa(orig_lat, orig_lng) {
    document.querySelector('.icon-load').style.display = 'block';

    var formData = new FormData();
    //var orig_text = origin_input.value;
    var search_rad = document.querySelector('#search_rad').value;

    formData.append('orig_lat', orig_lat);
    formData.append('orig_lng', orig_lng);
    
    formData.append('orig_text', origin_input.value);
    formData.append('search_rad', search_rad);
    

    var xhttp = new XMLHttpRequest();

    xhttp.open('POST', 'drivers', true);

    xhttp.onload = function(oEvent) {
        if (xhttp.status == 200) {
            //console.log( this.responseText );

            var drivers = JSON.parse(this.responseText);

            showDrivers(drivers);

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
}



//    console.log( 'ssubmit' );
//    
//    e.preventDefault();



//document.querySelector('#coordinates').addEventListener('submit', function(e) {
//    console.log( 'ssubmit' );
//    
//    e.preventDefault();
//
///*---------------- sending origins to server -------------------------*/
//    
//    
//    
////        var place = autocomplete.getPlace();
////        console.log( autocomplete.getPlace() );
//
////    if (!place.geometry) {
////      window.alert("No details available for input: '" + place.name + "'");
////      return;
////    }
//  
//    
//    //var search_rad = document.querySelector('#search_rad').value;
//    
//
//    document.querySelector('.icon-load').style.display = 'block';
//
//    var formData = new FormData(document.querySelector('#coordinates'));
//
//    formData.append('orig_lat', orig_lat);
//    formData.append('orig_lng', orig_lng);
//    
////    formData.append('orig_text', origin_input.value);
////    formData.append('search_rad', search_rad);
//    
//
//    var xhttp = new XMLHttpRequest();
//
//    xhttp.open('POST', 'drivers', true);
//
//    xhttp.onload = function(oEvent) {
//        if (xhttp.status == 200) {
//            //console.log( this.responseText );
//
//            var drivers = JSON.parse(this.responseText);
//
//            showDrivers(drivers);
//
//            document.querySelector('.icon-load').style.display = 'none';
//
//        } else {
//            throw new Error('Error! ajax request not sent!');
//        }
//    };
//    
//
//    /*-- for sequrity in yii2 --*/
//    var token = $('meta[name=csrf-token]').attr('content');
//    xhttp.setRequestHeader('X-CSRF-Token', token);
//    xhttp.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
//    /*-- /for sequrity in yii2 --*/
//
//    xhttp.send(formData);
//    
//    
//    //e.stopPropagation();
//    
//    
//    /*---------------- /sending origins to server ---------------------*/
//
//
//});






/*-*/
/*---------------- outputing drivers ---------------------*/
function showDrivers(drivers) {
    console.log( drivers );
    
    var geocoder = new google.maps.Geocoder;
    var originList = drivers.origin_addresses;
            var destinationList = drivers.destination_addresses;
            var outputDiv = document.getElementById('output');
            outputDiv.innerHTML = '';


            for (var i = 0; i < originList.length; i++) {
              var results = drivers.rows[i].elements;
              
//              geocoder.geocode({'address': originList[i]},
//                  showGeocodedAddressOnMap(false));
                  
              for (var j = 0; j < results.length; j++) {
//                geocoder.geocode({'address': destinationList[j]},
//                    showGeocodedAddressOnMap(true));

                outputDiv.innerHTML += originList[i] + ' to ' + destinationList[j] +
                    ': ' + results[j].distance.text + ' in ' +
                    results[j].duration.text + '<br>';
              }
            }
    
}
            
            
/*---------------- /outputing drivers ---------------------*/





function initMap() {
    
    map = new google.maps.Map(document.getElementById('map'), {
        mapTypeControl: true,
        center: {lat: 39.87601942, lng: -101.29394531},
        zoom: 5
    });

}

initMap();
