<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use nex\chosen\Chosen;
use yii\helpers\ArrayHelper;
use app\models\Authors;

/* @var $this yii\web\View */
/* @var $model app\models\Books */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="books-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'book_title')->textInput(['maxlength' => true]) ?>
    <h3 class="">Select authors</h3>
    <?=
    Chosen::widget([
        'model' => $model,
        'attribute' => 'author_list',
        'placeholder' => 'authors ...',
        'items' => ArrayHelper::map(
                Authors::find()->select('id, author_name')->asArray()->all(), 'id', 'author_name'
        ),
        'multiple' => true,
    ]);
    ?>
    
    <br><br>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
