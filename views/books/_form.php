<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Books */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="books-form">

    <?php //debug($model['authors']);die;
    $form = ActiveForm::begin(); ?>
    

    <?= $form->field($model, 'book_title')->textarea(['rows' => 1]) ?>
    
    <br>
    <br>
    
    <?php foreach( $model['authors'] as $author ) : ?>

        <?= $form->field($author, 'author_name')->textarea(['rows' => 1]) ?>

    <?php endforeach; ?>
    
    


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
