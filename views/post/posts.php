<?php
use yii\grid\GridView;
?>

<div class="row">  
    <?php
    echo yii\grid\GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'user_id',
            'message',
            'posttime'
        ],
    ]);
    ?>
</div>