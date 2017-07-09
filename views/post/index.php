<?php

use yii\helpers\Html;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Posts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Post', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            //'tags',
            
                [
                'attribute' => 'tags',
                'value' => function ($data) {
                    $tags = [];
                    
                    foreach ($data['tags'] as $tag) {
                        $tags[] = $tag['title'];
                        
                    }
        
//                    debug(implode(", ", $tags));
//                    die;
                        //return $data->category->name;
                        return implode(", ", $tags);
                },
                'format' => 'html'
            ],
            
            'id',
            'title',
            'alias',
            'text:ntext',
            'date_create',
            // 'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    

</div>
