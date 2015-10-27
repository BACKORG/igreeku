<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $this->redirect('profile');
        }

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionSignup(){
        $model = new \app\models\User;

        if ( $model->load(Yii::$app->request->post()) ) {

            $model->password = md5($model->password);
            $model->password_repeat = md5($model->password_repeat);
            if( $model->save() ){
                $this->redirect(['login']);
            }
        }

        return $this->render('signup',[
            'model' => $model,
        ]);
    }

    public function actionProfile(){
        $postModel = new \app\Models\Posts;
        $posts = $postModel->find()
                            ->where(['user_id' => \Yii::$app->user->identity->id])
                            ->orderBy('posttime desc')
                            ->all();

        $postString = '';
        foreach ($posts as $post) {
            $postString .= $this->renderPartial('/post/individual_post', [
                'post' => $post->attributes
            ]);
        }

        return $this->render('profile', [
            'postString' => $postString
        ]);
    }
}
