<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>
<div class="row">
    <h2 class="text-center">
        <span class="glyphicon glyphicon-book" aria-hidden="true"></span> Create Jobs
    </h2>

    <br>

    <?php $form = ActiveForm::begin([
        'id' => 'job-form',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-8\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-2 control-label'],
        ],
    ]); ?>

        <?= $form->field($model, 'title') ?>

        <?= $form->field($model, 'description')->textArea(['rows' => '6']) ?>

        <?= $form->field($model, 'start_datetime')->textInput(array('placeholder' => 'Start datetime yyyy-mm-dd'));  ?>

        <?= $form->field($model, 'end_datetime')->textInput(array('placeholder' => 'End datetime yyyy-mm-dd'));  ?>

        <div class="form-group">
            <div class="col-lg-offset-2 col-lg-12">
                <?= Html::submitButton('Save', ['class' => 'btn btn-primary', 'name' => 'save-button']) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>
</div>