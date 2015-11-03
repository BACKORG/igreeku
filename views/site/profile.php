<div class="row home-page">
	<div class="col-md-3">
		<div class="well left-side clearfix">
			<div class="ls-1">
				<img src="/images/igreeku-1.jpg">
			</div>

			<div class="ls-2">
				 <img src="<?=empty(\Yii::$app->user->identity->profile_image)?'/images/default-profile-image.png':\Yii::$app->user->identity->profile_image;?>" class="img-circle img-thumbnail">
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
			<div class="well" style="background-color:#fff;">
				<h5 class="ald">Sponsored</h5>
				<div>
					<img class="img-thumbnail"  src="/images/instagram_2.jpg" style="width:100%;">
				</div>
				<br>
				<p> 
					<strong>It might be time to visit Iceland.</strong>
					Iceland is so chill, and everything looks cool here. Also, we heard the people are pretty nice. What are you waiting for?
				</p>
				<button class="btn btn-primary">Buy a ticket</button>
			</div>
		</div>
	</div>
</div>