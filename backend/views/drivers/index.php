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
    
    
    
    <div class="icon-load"></div>
    <form action="" method="" id="coordinates" class="search-form">
        
        <input id="origin-input" class="search-form__origin" type="text" 
               name="orig_text" placeholder="Enter an origin location" required autofocus><br><br>
        
        Search radius: <br>
        <input id="search_rad" type="text" name="search_rad" value="500"><br>
        
        <br>
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
