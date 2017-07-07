<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\LinkPager;

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
        <?= Html::a('Create Books', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'book_title:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);?>
    
    
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
            $author_names = [];
            foreach ($book['authors'] as $author) {
                $author_names[] = $author['author_name'];
            }
            ?>


            <tr>
                <td><?= $book['id'] ?></td>
                <td><?= $book['book_title'] ?></td>
                <td>
                    <?php
                    $authors_str = [];
                    foreach ($author_names as $name) {
                        $authors_str[] = $name;
                    }
                    echo implode(", ", $authors_str);
                    ?>
                </td>
                <td><a href="/books/update/<?= $book['id'];  ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                <td><a href="/books/delete/<?= $book['id'];   ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
            </tr>
        <?php endforeach; ?>
    </table>
    
    <?= LinkPager::widget(['pagination' => $pagination]) ?>
</div>
