<?php

namespace app\controllers;
use yii\data\Pagination;
use yii\data\ActiveDataProvider;

class UserController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }


    public function actionAll(){
        $dataProvider = new ActiveDataProvider([
            'query' => \app\Models\User::find(),
            'pagination' => [
                'pageSize' => 3,
            ],
        ]);

        return $this->render('all', [
            'dataProvider' => $dataProvider,
        ]);
    }
}
