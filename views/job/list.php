<div class="row">
    <div class="col-md-3">
        <div class="well left-side clearfix">
            <div class="ls-1">
                <img src="/images/igreeku-1.jpg">
            </div>

            <div class="ls-2">
                 <img src="<?=empty(\Yii::$app->user->identity->profile_image)? '/images/default-profile-image.png' : '/uploads/'.\Yii::$app->user->identity->profile_image;?>" class="img-circle img-thumbnail">
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
        <h1 class="text-center"><i class="fa fa-home"></i> Job Lists</h1>
        <?php foreach ($data as $job) { ?>
            <div class="well">
                <div class="media">
                    <div class="media-left">
                        <img class="media-object img-circle" src="<?=!empty($job->user['profile_image'])? '/uploads/'.$job->user['profile_image']:'/images/default-profile-image.png';?>" width=64 height=64>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading"><?=$job->title?></h4>
                        <div>
                            <?=$job->description?>
                        </div>

                        <?php if( !empty($job->link) ){ ?>
                            <div class="clearfix" style="margin-top:10px;">
                                <span class="label label-danger">
                                Job Link:
                                </span>
                                &nbsp;
                                <span class="label label-primary">
                                    <a  style="color:#fff;" href="<?=$job->link?>" target="_blank"><?=$job->link?></a>
                                </span>
                            </div>
                        <?php }?>

                        <div class="clearfix"><small class="pull-right">Job Posted On: <?=$job->start_datetime?></small></div>
                         <div class="clearfix"><small class="pull-right">Last date to apply: <?=$job->end_datetime?></small></div>
                         <div class="clearfix"><b><small class="pull-right">author: <?=$job->user['firstname'] .' '.$job->user['lastname']?></small></b></div>
                    </div>
                </div>
            </div>
        <?php }?>
    </div>
</div>