<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Library';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="library">
    <h1><?= Html::encode($this->title) ?></h1>


    <div class="library__books">
        <a href="/books">BOOKS</a>
    </div>

    <div class="library__authors">
        <a href="/authors">AUTHORS</a> 
    </div>
    

    
</div>
