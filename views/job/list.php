<div class="row">
    <div class="col-md-12">
        <h1 class="text-center">Job Lists</h1>
        <?php foreach ($data as $job) { ?>
            <div class="well">
                <h3><?=$job->title?></h3>
                <div style="font-size:16px;"><?=$job->description?></div>
                <div><small>Start Time: <?=$job->start_datetime?></small></div>
                <div><small>End Time: <?=$job->end_datetime?></small></div>
            </div>
        <?php }?>
    </div>
</div>