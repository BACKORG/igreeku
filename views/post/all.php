<div class="row">
    <div class="col-md-3">
        <div class="well left-side clearfix">
            <div class="ls-1">
                <img src="/images/igreeku-1.jpg">
            </div>

            <div class="ls-2">
                 <img src="<?=empty(\Yii::$app->user->identity->profile_image)?'/images/default-profile-image.png' : '/uploads/'.\Yii::$app->user->identity->profile_image;?>" class="img-circle img-thumbnail">
            </div>

            <div class="ls-3">
                <?=\Yii::$app->user->identity->firstname?> <?=\Yii::$app->user->identity->lastname?>
            </div>

            <div class="edit-profile" >
                <a href="/profile/edit">
                    <i class="fa fa-edit"></i>
                    Edit Profile
                </a>
                <br>
                <a href="/user/password">
                    <i class="fa fa-user-secret"></i>
                    Change Password
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-9">
        <h1 class="text-center"><i class="fa fa-globe"></i> News Feed</h1>
        <?php foreach ($posts as $post) { ?>
            <div class="well">
                <div class="media">
                    <div class="media-left">
                        <img class="media-object img-circle" src="<?=empty($post->user['profile_image'])?'/images/default-profile-image.png' : '/uploads/'.$post->user['profile_image'];?>" width=64 height=64>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading"><?=$post->user['firstname'] . ' ' . $post->user['lastname']?></h4>
                        <div>
                            <?=$post->message?>
                        </div>
                        <div class="clearfix"><small class="pull-right">post time: <?=$post->posttime?></small></div>
                        <div class="pull-right">
                            <?php if(Yii::$app->user->identity->type == 3 || Yii::$app->user->identity->type == 2){ ?>
                                <br>
                                <a href="/post/edit?id=<?=$post->id?>" title="Edit" style="margin-right:15px;">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </a>

                                <a href="/post/delete?id=<?=$post->id?>" title="Delete">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </a>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
        <?php }?>
    </div>

    <div class="col-md-4">
        
    </div>
</div>