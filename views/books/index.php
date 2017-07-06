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


        
            
            
            <table class="table-bordered table-striped table">
                <tr>
                    <th>Book ID</th>
                    <th>Book title</th>
                    <th>Author names</th>
                    <th>Edit book</th>
                    <th>Delete book</th>
                </tr>
                <?php foreach ($books as $book): ?>
                
                
                    <?php
                        $authors = Books::findOne($book['book_id'])->booksAuthors; // getting authors objects via hasMany method
                        $authors_ids = [];

                        foreach ($authors as $author) {
                            $authors_ids[] = $author->author_id;
                        }

                        $authors_names = Authors::find()->asArray()->where(['author_id' => $authors_ids])->all();
                    ?>
                
                
                    <tr>
                        <td><?= $book['book_id'] ?></td>
                        <td><?= $book['book_title'] ?></td>
                        <td>
                                <?php 
                                    $authors_str = [];
                                    foreach ($authors_names as $name) {
                                        $authors_str[] = $name['author_name'];
                                    }
                                    
                                    echo implode(", ", $authors_str);
                                
                                ?>
                            
                        </td>
                        <td><a href="/admin/book/update/<?php //echo $book['book_id']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                        <td><a href="/admin/book/delete/<?php //echo $book['book_id']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>


</div>
