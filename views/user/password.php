<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;


//use app\models\Country;
$schools = app\models\Schools::find()->all();
 
use yii\helpers\ArrayHelper;
$listSchoolData=ArrayHelper::map($schools,'id','fullname');
?>
<div class="row">
    <div class="col-md-offset-2 col-md-8">
        <h2 class="text-center">
            <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Change Password
        </h2>

        <br>

        <?php if(isset($success) && $success){?>
            <div class="alert alert-success" role="alert">
              <a href="#" class="alert-link">You had succeed update your password.</a>
            </div>
        <?php }?>

        <?php $form = ActiveForm::begin([
            'id' => 'profile-form',
            'options' => ['class' => 'form-horizontal', 'enctype' => 'multipart/form-data'],
            'fieldConfig' => [
                'template' => "{label}\n<div class=\"col-lg-8\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                'labelOptions' => ['class' => 'col-lg-3 control-label'],
            ],
        ]); ?>

            <?= $form->field($model, 'password') ?>

            <?= $form->field($model, 'password_repeat') ?>

            <div class="form-group">
                <div class="col-lg-offset-2 col-lg-12">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-primary', 'name' => 'save-button']) ?>
                </div>
            </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>