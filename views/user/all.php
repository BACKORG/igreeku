<?php
use yii\grid\GridView;
use yii\grid\ActionColumn;

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
            [
                'attribute'=>'type',
                'format' => 'text',
                'label' => 'User Type',
                'value' => function($model, $key, $index, $column){
                    switch ($model->type) {
                        case '0':
                            return 'Basic User';
                        break;

                        case '1':
                            return 'Alumni User';
                        break;

                        case '2':
                            return 'Admin User';
                        break;
                        
                        default:
                            return 'Super Admin';
                        break;
                    }
                }   
            ],
            'dob',
            [
                'class' => ActionColumn::className(),
            ]
        ],
    ]);
    ?>
</div>