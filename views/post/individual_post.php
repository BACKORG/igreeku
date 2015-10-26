<div class="individual_post">
    <div class="ip-1">
        <strong>
            <?=\Yii::$app->user->identity->firstname?> <?=\Yii::$app->user->identity->lastname?>
        </strong>

        <time class="pull-right">
            <small><?=$post['posttime']?></small>
        </time>
    </div>

    <div>
        <?=$post['message']?>
    </div>
</div>