<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BooksAuthors */

$this->title = 'Update Books Authors: ' . $model->books_authors_id;
$this->params['breadcrumbs'][] = ['label' => 'Books Authors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->books_authors_id, 'url' => ['view', 'id' => $model->books_authors_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="books-authors-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
