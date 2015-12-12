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

        <div class="form-group">
            <label class="col-lg-2 control-label">Start Datetime:</label>
            <div class="col-lg-3">
                <input type="date" value="<?=date('Y-m-d')?>" class="form-control" name="Jobs[start_datetime]">
            </div>
        </div>


        <div class="form-group">
            <label class="col-lg-2 control-label">End Datetime:</label>
            <div class="col-lg-3">
                <input type="date" value="<?=date('Y-m-d')?>" class="form-control" name="User[dob]">
            </div>
        </div>


        <div class="form-group">
            <div class="col-lg-offset-2 col-lg-12">
                <?= Html::submitButton('Save', ['class' => 'btn btn-primary', 'name' => 'save-button']) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>
</div>