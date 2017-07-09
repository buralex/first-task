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
        <?= Html::a('Create Books', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'book_title',
            [
                'label' => 'Authors',
                'format' => 'ntext',
                'attribute'=>'author_name',
                'value' => function($model) {
                    foreach ($model->authors as $author) {
                        $author_names[] = $author->author_name;
                    }
                    return implode(", ", $author_names);
                },
            ],
                        
            [
                'label' => 'Author quantity',
                'format' => 'raw',
                'attribute' => 'author_quantity',
                'value' => function ($model) {
        
                    return count($model['authors']);
                },
                'format' => 'html'
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
