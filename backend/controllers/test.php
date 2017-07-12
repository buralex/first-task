   <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'orig_lat')->label('Origin latitude'); ?> 

    <?= $form->field($model, 'orig_lng')->label('Origin longitude'); ?>
    
    <?= $form->field($model, 'search_rad')->label('Radius of search (miles)'); ?> 

    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>
