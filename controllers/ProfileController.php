<?php

namespace app\controllers;

use Yii;

class ProfileController extends \yii\web\Controller
{
    public function actionEdit(){
        $user_id = \Yii::$app->user->identity->id;
        $userModel = new \app\Models\User(['scenario' => \app\models\User::SCENARIO_UPDATE]);

        $profile = $userModel::find()
                    ->where(['id' => $user_id])
                    ->one();

        if ( Yii::$app->request->post() ) {
            $data = Yii::$app->request->post();
            $profile->setAttributes( $data['User'] );
            $profile->save();
        }


  

        return $this->render('edit', [
            'model' => $profile
        ]);
    }

    public function actionSave(){
       
    }

}
