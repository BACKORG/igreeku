<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>
<div class="row">
    <div class="col-md-offset-2 col-md-8">
        <h2 class="text-center">
            <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Update Your Post
        </h2>

        <br>

        <?php $form = ActiveForm::begin([
            'id' => 'profile-form',
            'options' => ['class' => 'form-horizontal', 'enctype' => 'multipart/form-data'],
            'fieldConfig' => [
                'template' => "{label}\n<div class=\"col-lg-8\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                'labelOptions' => ['class' => 'col-lg-2 control-label'],
            ],
        ]); ?>

            <?= $form->field($model, 'message')->textArea(['rows' => 6]) ?>

            <div class="form-group">
                <div class="col-lg-offset-2 col-lg-12">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-primary', 'name' => 'save-button']) ?>
                </div>
            </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>