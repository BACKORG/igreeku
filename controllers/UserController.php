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
        if(\Yii::$app->user->identity->type == 3){
            $query = \app\Models\User::find();
        }else{
            $query = \app\Models\User::find()->where('type != :type', ['type' => 3]);
        }

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
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


        if(\Yii::$app->user->identity->type == 3){
            $userType = [
                0 => 'Basic User',
                1 => 'Alumni User',
                2 => 'Admin User',
                3 => 'Super User'
            ];
        }else{
            $userType = [
                0 => 'Basic User',
                1 => 'Alumni User',
                2 => 'Admin User',
            ];
        }

        return $this->render('update', [
            'model' => $profile,
            'userType' => $userType
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

    public function actionPassword(){
        $id = \Yii::$app->user->identity->id;
        $model = \app\Models\User::findOne($id);
        $success = false;

        if ( \Yii::$app->request->isPost ) {
            $data = \Yii::$app->request->post();

            $data['User']['password'] = md5($data['User']['password']);

            $model->setAttributes( $data['User'] );
            $model->save();

            $success = true;
        }

        $model->password = '';
        return $this->render('/user/password', [
            'model' => $model,
            'success' => $success
        ]);
    }
}
