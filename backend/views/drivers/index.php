<?php

use yii\helpers\Html;
use yii\grid\GridView;

use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $searchModel backend\models\DriversSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Drivers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="drivers-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php // echo Html::a('Create Drivers', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    
    
    <form action="" method="" id="coordinates">
  Lat: <input type="text" name="orig_lat" value="27"><br>
  Lng: <input type="text" name="orig_lng" value="-110"><br>
  Search radius: <br>
  <input type="text" name="search_rad" value="1000">
  <br><br>
  <input type="submit" class="" value="send">

</form> 
<br>

<div id="demo">
<h2>The XMLHttpRequest Object</h2>
<button type="button" onclick="loadDoc()">Change Content</button>
</div>
<script>
function loadDoc() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
    }
  };
  xhttp.open("POST", "drivers", true);
  xhttp.send();
}
</script>

<!--<button class="" id = "btn">send</button>-->
 
    <div id="right-panel">
      <div id="inputs">
        <pre>
var origin1 = {lat: 55.930, lng: -3.118};
var origin2 = 'Greenwich, England';
var destinationA = 'Stockholm, Sweden';
var destinationB = {lat: 50.087, lng: 14.421};
        </pre>
      </div>
      <div>
        <strong>Results</strong>
      </div>
      <div id="output"></div>
    </div>
    <div id="map"></div>
    <script>
      function initMap() {
        var bounds = new google.maps.LatLngBounds;
        var markersArray = [];
        

        
        
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

        var destinationIcon = 'https://chart.googleapis.com/chart?' +
            'chst=d_map_pin_letter&chld=D|FF0000|000000';
        var originIcon = 'https://chart.googleapis.com/chart?' +
            'chst=d_map_pin_letter&chld=O|FFFF00|000000';
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 55.53, lng: 9.4},
          zoom: 10
        });
        var geocoder = new google.maps.Geocoder;

        var service = new google.maps.DistanceMatrixService;
        service.getDistanceMatrix({
          origins: [origin1],
          destinations: destinations,
          travelMode: 'DRIVING',
          unitSystem: google.maps.UnitSystem.METRIC,
          avoidHighways: false,
          avoidTolls: false
        }, function(response, status) {
          if (status !== 'OK') {
            alert('Error was: ' + status);
          } else {
            var originList = response.originAddresses;
            var destinationList = response.destinationAddresses;
            var outputDiv = document.getElementById('output');
            outputDiv.innerHTML = '';
            deleteMarkers(markersArray);

            var showGeocodedAddressOnMap = function(asDestination) {
              var icon = asDestination ? destinationIcon : originIcon;
              return function(results, status) {
                if (status === 'OK') {
                  map.fitBounds(bounds.extend(results[0].geometry.location));
                  markersArray.push(new google.maps.Marker({
                    map: map,
                    position: results[0].geometry.location,
                    icon: icon
                  }));
                } else {
                  alert('Geocode was not successful due to: ' + status);
                }
              };
            };
            console.log( google.maps.UnitSystem );
            //console.log(originList);
            

            for (var i = 0; i < originList.length; i++) {
                
              var results = response.rows[i].elements;
              
              
              
              
              
              geocoder.geocode({'address': originList[i]},
                  showGeocodedAddressOnMap(false));
                  
              for (var j = 0; j < results.length; j++) {
                  
                  console.log(destinationList[j]);
                  
                geocoder.geocode({'address': destinationList[j]},
                    showGeocodedAddressOnMap(true));
                    
                    console.log(results[j].duration);
                    
                outputDiv.innerHTML += originList[i] + ' to ' + destinationList[j] +
                    ': ' + results[j].distance.value + ' in ' +
                    results[j].duration.text + '<br>';
              }
            }
          }
        });
      }

      function deleteMarkers(markersArray) {
        for (var i = 0; i < markersArray.length; i++) {
          markersArray[i].setMap(null);
        }
        markersArray = [];
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCS_UOJWmyS_oKkPDMH84xaToDOQX5_8Lk&callback=initMap">
    </script>
    
    

    
    
    
    <?php 
//            GridView::widget([
//        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
//        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],
//
//            'id',
//            'name',
//            'address',
//            'lat',
//            'lng',
//
//            ['class' => 'yii\grid\ActionColumn'],
//        ],
//    ]);
            ?>
    
   
    
</div>
