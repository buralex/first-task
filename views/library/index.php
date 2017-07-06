<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Library';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="library">
    <h1><?= Html::encode($this->title) ?></h1>
    
<!--    <a href="/manage-books">MANAGE BOOKS</a>-->
    
        <?php /*echo GridView::widget([
//        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
//        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],
//
//            'book_id',
//            'book_title:ntext',
//
//            ['class' => 'yii\grid\ActionColumn'],
//        ],
    ]);*/ ?>

    <div class="library__books">
        <?php foreach($books as $book) : ?>

        
<!--        <div class="some">
            <a href="#"> <?php echo $book->book_title; ?> </a>
        </div>-->

        <?php endforeach; ?>

        <a href="/books">BOOKS</a>

    </div>

    <div class="library__authors">

        <?php foreach($authors as $author) : ?>

        
<!--        <div class="some">
            <a href="authors/view?id=<?= $author->author_id ?>"> <?php echo $author->author_name; ?> </a>
        </div>-->

        <?php endforeach; ?>

        <a href="/authors">AUTHORS</a>
        
    </div>
    

    
</div>
