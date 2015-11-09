<?php
namespace app\controllers;

use Yii;

class JobController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionPost(){
        $user_id = \Yii::$app->user->identity->id;
        $model = new \app\Models\Jobs();

        if ( Yii::$app->request->post() ) {
            $data = Yii::$app->request->post();
            $data['Jobs']['user_id'] = $user_id;
            $model->setAttributes( $data['Jobs'] );
            $model->save();
        }
 

        return $this->render('post', [
            'model' => $model
        ]);
    }

    public function actionList(){
        $user_id = \Yii::$app->user->identity->id;
        $model = new \app\Models\Jobs();

        $data = $model::find()
            ->orderBy('id desc')
            ->all();

        return $this->render('list', [
            'data' => $data
        ]);
    }

}
