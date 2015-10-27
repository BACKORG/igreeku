<?php

namespace app\controllers;

class PostController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionSave(){
        $message = \Yii::$app->request->post('message');
        $user_id = \Yii::$app->user->identity->id;

        $postModel = new \app\Models\Posts;
        $postModel->setAttributes([
            'user_id' => $user_id,
            'message' => $message,
            'posttime' => date('Y-m-d H:i:s')
        ]);
        $postModel->save();
        
        echo $this->renderPartial('individual_post', [
            'post' => $postModel->attributes
        ]);
    }

}
