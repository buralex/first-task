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
        Lat: <input type="text" name="orig_lat" value="37.99616268" autofocus><br>
        Lng: <input type="text" name="orig_lng" value="-91.93359375"><br>
        Search radius: <br>
        <input type="text" name="search_rad" value="10000">
        <br><br>
        <input type="submit" class="" value="send">
        

    </form> 
<br>


<!--      <div id="inputs">
        <pre>
var origin1 = {lat: 55.930, lng: -3.118};
var origin2 = 'Greenwich, England';
var destinationA = 'Stockholm, Sweden';
var destinationB = {lat: 50.087, lng: 14.421};
        </pre>
      </div>-->
      <div>
        <strong>Results</strong>
      </div>
      <div id="output"></div>
    </div>
    <div id="map"></div>
    
 

    
    

    
    
    
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
