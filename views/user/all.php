<?php
use yii\grid\GridView;
?>

<div class="row">  
    <?php
    echo yii\grid\GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'firstname',
            'lastname',
            'email',
            'type',
            'dob'
        ],
    ]);
    ?>
</div>