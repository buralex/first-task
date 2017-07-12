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
    
    
 <form action="" id = "coordinates">
  Lat: <input type="text" name="orig_lat" value=""><br>
  Lng: <input type="text" name="orig_lng" value=""><br>
  Search radius: <br>
  <input type="text" name="search_rad" value=""><br>

</form> 
<br>

<button class="" id = "btn">send</button>
    
<div id="map"></div>
    <script>
        
        

        
        
        
//function showNearest() {
//    var xhttp = new XMLHttpRequest();
//    //var dataList = document.querySelector(params.dataList);
//    //var input = document.querySelector(params.input);
//
//        xhttp.open('GET', 'drivers/nearest', true);
//
//        xhttp.onload = function(oEvent) {
//            if (xhttp.status == 200) {
//
//            console.log(this.responseText);
//
//            } else {
//                throw new Error("Error! not sent!");
//            }
//        };
//        xhttp.send();
//}
//
//showNearest();




        
        
        
  /*      

      function initMap() {
          
        var myLatLng = {lat: -25.363, lng: 131.044};
        
          var locations = [
          ['Stadtbibliothek Zanklhof', 47.06976, 15.43154, 1],
          ['Stadtbibliothek dieMediathek', 47.06975, 15.43116, 2],
          ['Stadtbibliothek Gösting', 47.09399, 15.40548, 3],
          ['Stadtbibliothek Graz West', 47.06993, 15.40727, 4],
          ['Stadtbibliothek Graz Ost', 47.06934, 15.45888, 5],
          ['Stadtbibliothek Graz Süd', 47.04572, 15.43234, 6],
          ['Stadtbibliothek Graz Nord', 47.08350, 15.43212, 7],
          ['Stadtbibliothek Andritz', 47.10280, 15.42137, 8]
        ];

//        var map = new google.maps.Map(document.getElementById('map'), {
//          zoom: 4,
//          center: myLatLng
//        });

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 13,
          center: new google.maps.LatLng(47.071876, 15.441456),
          mapTypeId: google.maps.MapTypeId.ROADMAP
        });
        
        //console.log(map);
        
        var marker, i;

        for (i = 0; i < locations.length; i++) {
          marker = new google.maps.Marker({
            position: new google.maps.LatLng(locations[i][1], locations[i][2]),
            map: map
          });
        }
        

      }
      
      */
    </script>
<!--    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCS_UOJWmyS_oKkPDMH84xaToDOQX5_8Lk&callback=initMap">
    </script>-->
    
    
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
