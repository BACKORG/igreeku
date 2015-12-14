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
        $model = new ContactForm();
        return $this->render('index',  [
            'model' => $model,
        ]);
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
        $model = new \app\models\User(['scenario' => \app\models\User::SCENARIO_REGISTER]);

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
        $user_id = \Yii::$app->user->identity->id;
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

        $Jobmodel = new \app\Models\Jobs(['scenario' => \app\models\Jobs::SCENARIO_DEFAULT]);

        if ( Yii::$app->request->post() ) {
            $data = Yii::$app->request->post();
            $data['Jobs']['user_id'] = $user_id;
            $Jobmodel->link = Yii::$app->request->post('link');
            $Jobmodel->setAttributes( $data['Jobs'] );

            if ($Jobmodel->validate()) {
                // all inputs are valid
                $Jobmodel->save();
            } else {
                // validation failed: $errors is an array containing error messages
                $errors = $Jobmodel->errors;
                exit();
            }

            $this->redirect('/job/list');
        }
 

        return $this->render('profile', [
            'postString' => $postString,
            'Jobmodel' => $Jobmodel
        ]);
    }

    public function actionForgot(){
        return $this->render('forgot');
    }

    public function actionChapter(){
        $school_id = Yii::$app->request->post('school_id');
        
        $model = new \app\Models\Chapter;
        $chapter = $model->find()
                        ->where(['school_id' => $school_id])
                        ->all();

        return $this->renderPartial('chapter',[
            'chapters' => $chapter
        ]);
    }

    public function sendmail($email,$smtpSubject,$smtpBody){
        $smtpHost="smtp.gmail.com";
        $smtpPort="465";
        $smtpUsername="donotreplycea@gmail.com";
        $smtpPassword="donothack$$";
        $smtpFrom="donotreplycea@gmail.com";
        $smtpFromname="IGreeku Admin";


        if ( isset($smtpHost)  && isset($smtpPort) && isset($smtpUsername) && isset($smtpPassword) && isset($smtpFrom) && isset($smtpFromname) && isset($smtpSubject) && isset($smtpBody)){
                require_once($_SERVER['DOCUMENT_ROOT'].'/library/PHPMailer/class.phpmailer.php');
                include_once($_SERVER['DOCUMENT_ROOT'].'/library/PHPMailer/class.smtp.php');

                $mail = new \PHPMailer;
                $mail->IsSMTP(); // enable SMTP
                $mail->SMTPAuth = true; // authentication enabled
                $mail->SMTPSecure = 'ssl'; // secure transfer enabled
                //$mail->SMTPDebug = 4;
                $mail->Host = $smtpHost;
                $mail->Port = $smtpPort; // or 587
                $mail->Username = $smtpUsername;
                $mail->Password = $smtpPassword;
                $mail->SetFrom = $smtpFrom;
                $mail->FromName = $smtpFromname;
                $mail->addAddress($email, 'IGreeku Test User');
                $mail->Subject = $smtpSubject;
                $mail->Body    = $smtpBody;
                $mail->IsHTML(true);
                if (!$mail->send()) {
                   echo 'Message could not be sent.';
                   echo 'Mailer Error: ' . $mail->ErrorInfo;
                   exit;
                }else{
                    echo 'Please check your mailbox.';
                }
        }
    }


    function actionMailto(){
        $email = Yii::$app->request->post('email');

        $autoEmailafterForgotPasswordSubject="Forgotten Password for IGreeku";
        $emailPassword = uniqid();

        // model update
        $model = \app\Models\User::find()->where(['email' => $email])->one();
        if(!$model){
            echo 'Your email address is not exist in our database.';
            exit();
        }
        $model->password = md5($emailPassword);
        $model->save();


        $autoEmailafterForgotPasswordMailBody="<html><head></head><body><pre>This is an automated message generated by IGreeku administration.</pre><pre>Following is your login email and password:</pre><pre>   Login ID: [". $email ."]<br>    Password: [" . $emailPassword ."]</pre><pre>Please use this IGreeku to log into IGreeku web site to complete your application.</pre></body></html>";

        $this->sendmail($email,$autoEmailafterForgotPasswordSubject,$autoEmailafterForgotPasswordMailBody);
                
    }
}
