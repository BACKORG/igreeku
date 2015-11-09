<div class="row">
    <div class="col-md-12">
        <h1 class="text-center">News Feed</h1>
        <?php foreach ($posts as $post) { ?>
            <div class="well">
                <h5><?=$post->message?></h5>
                <div><small>post time: <?=$post->posttime?></small></div>
            </div>
        <?php }?>
    </div>
</div>