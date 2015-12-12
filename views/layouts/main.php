<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>

    <?php 
        $this->registerJsFile('/js/scrollReveal.min.js', ['position' => \yii\web\View::POS_HEAD]);
    ?>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'IGreekU',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],         
            Yii::$app->user->isGuest ? '' : ['label' => 'MyGreek', 'url' => ['/site/profile']],
            Yii::$app->user->isGuest ? '' : ['label' => 'Job List', 'url' => ['/job/list']],
            Yii::$app->user->isGuest ?
                ['label' => 'Login', 'url' => ['/site/login']] :
                [
                    'label' => 'Logout (' . Yii::$app->user->identity->firstname . ' ' . Yii::$app->user->identity->lastname. ')',
                    'url' => ['/site/logout']                ],
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="clearfix">
    <div class="col-md-4 col-xs-12 text-center">
        <small>© registered 501(c) 3 by IGreekU</small>
    </div>

    <div class="col-md-4 col-xs-12 text-center footer-mid">
        <small>Office Location: 6126 Lincolhn Avenue Morton Grove, IL 60053</small>
        <small>Phone: 203-988-8990</small>
        <small>Email: <a href="mailto:mail@qq.com">mail@gmail.com</a></small>
    </div>
    
    <div class="col-md-4 col-xs-12 text-center footer-social">
        <a href="http://www.facebook.com/" target="_blank">
            <i class="fa fa-facebook"></i>
        </a>
        <a href="http://twitter.com/" target="_blank">
            <i class="fa fa-twitter"></i>
        </a>
        <a href="http://instagram.com/" target="_blank">
            <i class="fa fa-instagram"></i>
        </a>
        <a href="https://plus.google.com/" target="_blank">
            <i class="fa fa-google-plus"></i>
        </a>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
