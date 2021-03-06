<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Sign Up';
$this->params['breadcrumbs'][] = $this->title;

//use app\models\Country;
$schools = app\models\Schools::find()->all();
 
use yii\helpers\ArrayHelper;
$listSchoolData=ArrayHelper::map($schools,'id','fullname');
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to sign up:</p>

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-7\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-2 control-label'],
        ],
    ]); ?>

        <?= $form->field($model, 'firstname') ?>

        <?= $form->field($model, 'lastname') ?>

        <?= $form->field($model, 'email') ?>

        <?= $form->field($model, 'password')->passwordInput() ?>

        <?= $form->field($model, 'password_repeat')->passwordInput() ?>

        <?= $form->field($model, 'school')->dropDownList( $listSchoolData, ['prompt' => 'Please choose your school', 'class'=>'school-drop form-control', 'onchange' => 'get_school_chapter(event);']); ?>


        <div class="form-group field-user-school">
            <label class="col-lg-2 control-label" for="user-chapter">Chapters</label>
            <div class="col-lg-3">
                <select class="form-control user-chapter-drop" name="User[chapter]">
                    <option value="">Please choose your school</option>
                </select>
            </div>
            <div class="col-lg-7"><p class="help-block help-block-error"></p></div>
        </div>

        <div class="form-group">
            <div class="col-lg-offset-2 col-lg-12">
                <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>
</div>
