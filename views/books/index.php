<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Books;
use app\models\Authors;

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
        <?php /* Html::a('Create Books', ['create'], ['class' => 'btn btn-success']) */ ?>
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
      ]); */ ?>



    <?php foreach($books as $book) : ?>
        
        <?php 
        
            // getting authors objects via hasMany method 
            $authors = Books::findOne($book['book_id'])->booksAuthors;
            $authors_ids = []; 

            foreach ($authors as $author) {
                //echo $author->author_id . '<br>';
                $authors_ids[] = $author->author_id;
            }

            $authors_names = Authors::find()->asArray()->where(['author_id' => $authors_ids])->all();

            //debug($authors_names) ;
        
        ?>
    
        <div class="some">
            <a href="#"> <?= $book['book_title']  ?> </a>
        </div>

        <?php foreach($authors_names as $name) : ?>

            <span>( <?= $name['author_name'] ?> )</span>

        <?php endforeach; ?>
        
        
    <?php endforeach; ?>


</div>
