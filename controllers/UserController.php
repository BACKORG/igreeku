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

    public function actionUpdate(){
        $user_id = \Yii::$app->request->get('id');
        $userModel = new \app\Models\User(['scenario' => \app\models\User::SCENARIO_ADMIN_UPDATE]);

        $profile = $userModel::find()
                    ->where(['id' => $user_id])
                    ->one();


        if ( \Yii::$app->request->isPost ) {
            $data = \Yii::$app->request->post();

            $profile->setAttributes( $data['User'] );
            $profile->type =  (int)$data['User']['type'];
            $profile->save();
        }

        return $this->render('update', [
            'model' => $profile,
        ]);
    }

    public function actionView(){
        $user_id = \Yii::$app->request->get('id');
        $userModel = new \app\Models\User(['scenario' => \app\models\User::SCENARIO_ADMIN_UPDATE]);

        $profile = $userModel::find()
                    ->where(['id' => $user_id])
                    ->one();


        if ( \Yii::$app->request->isPost ) {
            $data = \Yii::$app->request->post();

            $profile->setAttributes( $data['User'] );
            $profile->type =  (int)$data['User']['type'];
            $profile->save();
        }

        return $this->render('update', [
            'model' => $profile,
        ]);
    }

    public function actionDelete($id){
        $model = \app\Models\Jobs::deleteAll([
            'user_id' => $id
        ]);

        $model = \app\Models\Posts::deleteAll([
            'user_id' => $id
        ]);

        $model = \app\Models\User::findOne($id);
        $model->delete();

        $this->redirect('/user/all');
    }
}
