<div class="row home-page clearfix">
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

		
		<?php if(Yii::$app->user->identity->type !== 0){?>
			<div class="well text-center">
				<button style="margin-right:10px;" class="btn btn-info" data-toggle="modal" data-target="#job_post">Add a Job</button>
			</div>
		<?php }?>
	</div>

	<div class="col-md-6 clearfix">
		<div class="mid-side clearfix">
			<div class="ms-1 clearfix">
				<textarea class="form-control messages" rows="1" placeholder="Write Your Post ..."></textarea>
				<button type="button" class="btn btn-info pull-right" onclick="postMessage(event);">Post</button>
			</div>		
			<?=$postString?>
		</div>
	</div>

	<div class="col-md-3 clearfix">
		<div class="right-side clearfix">

			<?php if(Yii::$app->user->identity->type == 3){ ?>
		  	<div class="well clearfix">
			  	<h5 class="ald"><i class="fa fa-cog"></i> IGreekU Admin</h5>
			  	<ul>
			  		<li>
			  			<a href="/user/all">Manage Users</a>
			  		</li>
			  		<li>
			  			<a href="/post/posts">Manage Posts</a>
			  		</li>
			  	</ul>
		  	</div>
		  	<?php }else if(Yii::$app->user->identity->type == 2){ ?>
		  	  	<div class="well clearfix">
		  		  	<h5 class="ald"><i class="fa fa-cog"></i> IGreekU Admin</h5>
		  		  	<ul>
		  		  		<li>
		  		  			<a href="/user/all">Manage Alumni Users</a>
		  		  		</li>
		  		  	</ul>
		  	  	</div>
		  	<?php }?>

		  	<div class="well clearfix">
			  	<h5 class="ald"><i class="fa fa-globe"></i> User Feeds</h5>
			  	<a href="/post/all" class="btn btn-primary">Get All Feeds</a>
		  	</div>

			<div class="well">
				<h5 class="ald"><i class="fa fa-users"></i> Sponsored</h5>
				<div>
					<img class="img-thumbnail"  src="/images/instagram_2.jpg" style="width:100%;">
				</div>
				<br>
				<p> 
					<strong>Be great at what you do.</strong>
					<br>
					Our mission is simple: connect the world's professionals to make them more productive and successful. When you join LinkedIn, you get access to people, jobs, news, updates, and insights that help you be great at what you do.

				</p>
				<a href="http://linkedin.com" target="_blank" class="btn btn-primary">Link</a>
			</div>
		</div>
	</div>
</div>



<!-- Modal -->
<div class="modal fade" id="job_post" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title" id="myModalLabel">Add a new Job</h4>
	  </div>
	  <div class="modal-body">
			<?php
			use yii\helpers\Html;
			use yii\bootstrap\ActiveForm;

			?>
			<div class="row" style="padding:20px;">
				<h2 class="text-center">
					<span class="glyphicon glyphicon-book" aria-hidden="true"></span> Create Jobs
				</h2>

				<br>

				<?php $form = ActiveForm::begin([
					'id' => 'job-form',
					'options' => ['class' => 'form-horizontal'],
					'fieldConfig' => [
						'template' => "{label}\n<div class=\"col-lg-8\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
						'labelOptions' => ['class' => 'col-lg-3 control-label'],
					],
				]); ?>

					<?= $form->field($Jobmodel, 'title') ?>

					<?= $form->field($Jobmodel, 'description')->textArea(['rows' => '6']) ?>

					<?= $form->field($Jobmodel, 'link') ?>

					<div class="form-group">
					    <label class="col-lg-3 control-label">Job Posted On:</label>
					    <div class="col-lg-8">
					        <input type="date" value="<?=date('Y-m-d')?>" class="form-control" name="Jobs[start_datetime]">
					    </div>
					</div>


					<div class="form-group">
					    <label class="col-lg-3 control-label">Last date to apply:</label>
					    <div class="col-lg-8">
					        <input type="date" value="<?=date('Y-m-d')?>" class="form-control" name="Jobs[end_datetime]">
					    </div>
					</div>


					<div class="form-group">
						<div class="col-lg-offset-3 col-lg-12">
							<?= Html::submitButton('Save', ['class' => 'btn btn-primary', 'name' => 'save-button']) ?>
						</div>
					</div>

				<?php ActiveForm::end(); ?>
			</div>
	  </div>
	</div>
  </div>
</div>