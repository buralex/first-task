
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

//input.addEventListener("keypress", function(e) {
//    
////    if(event.keyCode == 13){
////        e.stopPropagation();
////
////    }
//var place = autocomplete.getPlace();
//    orig_lat = place.geometry.location.lat();
//    orig_lng = place.geometry.location.lng();
//});



    document.querySelector('#coordinates').addEventListener('submit', function(e) {
        console.log( 'ssubmit' );
        
        
        e.preventDefault();

        document.querySelector('.icon-load').style.display = 'block';

        var formData = new FormData(document.querySelector('#coordinates'));

        //formData.append('orig_lat', orig_lat);
        //formData.append('orig_lng', orig_lng);

        console.log( 'lat: ' + orig_lat + '   ' + 'lng: ' + orig_lng);

        var xhttp = new XMLHttpRequest();

        //console.log( formData );

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
        

    });



//console.log( place );

//if ( place ){
//    console.log( place );
//    var orig_lat = place.geometry.location.lat();
//    var orig_lng = place.geometry.location.lng();
//}







function initMap() {
    
    map = new google.maps.Map(document.getElementById('map'), {
        mapTypeControl: true,
        center: {lat: 39.87601942, lng: -101.29394531},
        zoom: 5
    });

}

initMap();

        

//        var types = document.getElementById('type-selector');
//        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
//        map.controls[google.maps.ControlPosition.TOP_LEFT].push(types);

        
        
//        autocomplete.bindTo('bounds', map);

//        var infowindow = new google.maps.InfoWindow();
//        var marker = new google.maps.Marker({
//          map: map,
//          anchorPoint: new google.maps.Point(0, -29)
//        });

//        autocomplete.addListener('place_changed', function() {
//          infowindow.close();
//          marker.setVisible(false);
//          var place = autocomplete.getPlace();
//          if (!place.geometry) {
//            // User entered the name of a Place that was not suggested and
//            // pressed the Enter key, or the Place Details request failed.
//            window.alert("No details available for input: '" + place.name + "'");
//            return;
//          }
//      });
