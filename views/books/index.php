<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BooksSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Books';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="books-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php /* Html::a('Create Books', ['create'], ['class' => 'btn btn-success'])*/ ?>
    </p>
    <?php /* GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'book_id',
            'book_title:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); */?>
    
    
    
            <?php foreach($books as $book) : ?>

        
        <div class="some">
            <a href="#"> <?php //echo $book['book_title']; ?> </a>
        </div>
    
    <?php //debug($book) ?>

        <?php endforeach; ?>
    
    <?= $books->BookAuthors ?>

</div>
