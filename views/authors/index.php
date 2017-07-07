<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AuthorsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Authors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="authors-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Authors', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php /*GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'author_name:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); */?>
    
    <table class="table-bordered table-striped table">
        <tr>
            <th>Author ID</th>
            <th>Author name</th>
            <th>Books</th>
            <th>Edit author</th>
            <th>Delete author</th>
        </tr>
        <?php foreach ($authors as $author): ?>


            <?php
            $book_titles = [];
            foreach ($author['books'] as $book) {
                $book_titles[] = $book['book_title'];
            }
            ?>


            <tr>
                <td><?= $author['id'] ?></td>
                <td><?= $author['author_name'] ?></td>
                <td>
    <?php
    $books_str = [];
    foreach ($book_titles as $title) {
        $books_str[] = $title;
    }
    echo implode(", ", $books_str);
    ?>
                </td>
                <td><a href="/authors/update/<?= $author['id']; ?>" title="edit"><i class="fa fa-pencil-square-o"></i></a></td>
                <td><a href="/authors/delete/<?= $author['id'];  ?>" title="delete"><i class="fa fa-times"></i></a></td>
            </tr>
<?php endforeach; ?>
    </table>
    
    
</div>
