<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>
<div class="row">
    <div class="col-md-offset-2 col-md-8">
        <h2 class="text-center">
            <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Update Your profile
        </h2>

        <br>

        <?php $form = ActiveForm::begin([
            'id' => 'profile-form',
            'options' => ['class' => 'form-horizontal'],
            'fieldConfig' => [
                'template' => "{label}\n<div class=\"col-lg-8\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                'labelOptions' => ['class' => 'col-lg-2 control-label'],
            ],
        ]); ?>

            <?= $form->field($model, 'firstname') ?>

            <?= $form->field($model, 'lastname') ?>

            <div class="form-group">
                <label class="col-lg-2 control-label">Profile Photo</label>
                <div class="col-lg-8">
                    <input type="file" value="" class="btn btn-info btn-xs">
                </div>
            </div>

            <?= $form->field($model, 'state')->dropDownList([
                'ct' => 'CT'
            ]) ?>

             <?= $form->field($model, 'school')->dropDownList([
                'fu' => 'Fairfield University',
                'yu' => 'Yale University',
                'ub' => 'University of Bridgeport'
            ]) ?>


            <div class="form-group">
                <label class="col-lg-2 control-label">Date Of Birth</label>
                <div class="col-lg-3">
                    <input type="date" value="<?=date('Y-m-d')?>" class="form-control" name="User[dob]">
                </div>
            </div>

             <?= $form->field($model, 'why')->textarea() ?>

            <div class="form-group">
                <div class="col-lg-offset-2 col-lg-12">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-primary', 'name' => 'save-button']) ?>
                </div>
            </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>