<div class="row home-page">
	<div class="col-md-3">
		<div class="left-side clearfix">
			<div class="ls-1">
				<img src="/images/igreeku-1.jpg">
			</div>

			<div class="ls-2">
				 <img src="/images/default-profile-image.png" class="img-circle img-thumbnail">
			</div>

			<div class="ls-3">
				<?=\Yii::$app->user->identity->firstname?> <?=\Yii::$app->user->identity->lastname?>
			</div>

			<div class="edit-profile" >
				<a href="/profile/edit">
					<i class="fa fa-edit"></i>
					Edit Profile
				</a>
			</div>
		</div>
	</div>

	<div class="col-md-6">
		<div class="mid-side clearfix">
			<div class="ms-1 clearfix">
				<textarea class="form-control messages" rows="1" placeholder="Write Your Post ..."></textarea>
				<button type="button" class="btn btn-info pull-right" onclick="postMessage(event);">Post</button>
			</div>		
			<?=$postString?>
		</div>
	</div>

	<div class="col-md-3">
		<div class="right-side">
			
		</div>
	</div>
</div>