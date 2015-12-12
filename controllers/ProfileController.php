<?php

namespace app\controllers;

use Yii;
use yii\web\UploadedFile;

class ProfileController extends \yii\web\Controller
{
    public function actionEdit(){
        $photo_url = '';
        $user_id = \Yii::$app->user->identity->id;
        $userModel = new \app\Models\User(['scenario' => \app\models\User::SCENARIO_UPDATE]);
        $uploadModel = new \app\Models\UploadForm();

        $profile = $userModel::find()
                    ->where(['id' => $user_id])
                    ->one();


        if (Yii::$app->request->isPost) {
            $uploadModel->imageFile = UploadedFile::getInstance($uploadModel, 'imageFile');
            if ($uploadModel->upload()) {
                $photo_url = $uploadModel->imageFile->baseName . '.' . $uploadModel->imageFile->extension ;
            }
        }


        if ( Yii::$app->request->post() ) {
            $data = Yii::$app->request->post();
            if(!empty($photo_url)){
                $data['User']['profile_image'] = $photo_url;
            }
            $profile->setAttributes( $data['User'] );
            $profile->save();
        }

        return $this->render('edit', [
            'model' => $profile,
            'uploadModel' => $uploadModel
        ]);
    }

    public function actionSave(){
       
    }

}
