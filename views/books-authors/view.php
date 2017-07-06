<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\BooksAuthors */

$this->title = $model->books_authors_id;
$this->params['breadcrumbs'][] = ['label' => 'Books Authors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="books-authors-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->books_authors_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->books_authors_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'books_authors_id',
            'book_id',
            'author_id',
        ],
    ]) ?>

</div>
