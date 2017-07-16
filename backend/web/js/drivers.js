
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
var search_rad = document.querySelector('#search_rad').value;


var origin_input = ( document.querySelector('#origin-input'));
var autocomplete = new google.maps.places.Autocomplete(origin_input);


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
    
    
    /*---------------- sending origins to server -------------------------*/

    document.querySelector('.icon-load').style.display = 'block';

    var formData = new FormData();

    formData.append('orig_lat', orig_lat);
    formData.append('orig_lng', orig_lng);
    formData.append('orig_text', origin_input.value);
    formData.append('search_rad', search_rad);
    

    var xhttp = new XMLHttpRequest();

    xhttp.open('POST', 'drivers', true);

    xhttp.onload = function(oEvent) {
        if (xhttp.status == 200) {

            //var jsonOptions = JSON.parse(this.responseText);

            console.log(this.responseText);

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
    
    /*---------------- /sending origins to server ---------------------*/
    
});




function initMap() {
    
    map = new google.maps.Map(document.getElementById('map'), {
        mapTypeControl: true,
        center: {lat: 39.87601942, lng: -101.29394531},
        zoom: 5
    });

}

initMap();
