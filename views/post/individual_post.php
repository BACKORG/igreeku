<div class="individual_post clearfix">
    <div class="col-md-2">
        <img src="<?=empty(\Yii::$app->user->identity->profile_image)?'/images/default-profile-image.png': '/uploads/'.\Yii::$app->user->identity->profile_image;?>" class="img-circle" width=48 height=48>
    </div>

    <div class="col-md-10">
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

        <div class="text-right">
            <a href="/post/edit?id=<?=$post['id']?>" title="Edit" style="margin-right:15px;">
                <span class="glyphicon glyphicon-pencil"></span>
            </a>

            <a href="/post/delete?id=<?=$post['id']?>" title="Delete">
                <span class="glyphicon glyphicon-trash"></span>
            </a>
        </div>
    </div>
</div>