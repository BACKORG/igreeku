<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $firstname
 * @property string $lastname
 * @property string $email
 * @property string $password
 * @property integer $college_id
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    const SCENARIO_DEFAULT = 'default';
    const SCENARIO_LOGIN = 'login';
    const SCENARIO_REGISTER = 'register';
    const SCENARIO_UPDATE = 'update';


    public $password_repeat;

    public $username;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    public function scenarios()
    {
        return [
            self::SCENARIO_DEFAULT => ['firstname', 'lastname', 'email', 'password', 'profile_image', 'college_id', 'state', 'school', 'dob', 'why'],
            self::SCENARIO_LOGIN => ['email', 'password'],
            self::SCENARIO_REGISTER => ['firstname', 'lastname', 'email', 'password', 'password_repeat', 'state', 'school'],
            self::SCENARIO_UPDATE => ['firstname', 'lastname', 'state', 'school', 'dob', 'why']
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['college_id'], 'integer'],
            [['firstname', 'lastname', 'email', 'password'], 'required'],
            [['email'], 'email'],
            [['firstname', 'lastname', 'email'], 'string', 'max' => 100],
            [['state', 'school'], 'string', 'max' => 45],
            [['password'], 'string', 'max' => 50],
            ['password_repeat', 'required'],
            ['password_repeat', 'compare', 'compareAttribute' => 'password'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'email' => 'Email',
            'password' => 'Password',
            'password_repeat' => 'Password Confirm',
            'profile_image' => 'Profile Image',
            'college_id' => 'College ID',
            'state' => 'State',
            'school' => 'School',
            'dob' => 'Date Of Birth',
            'why' => 'Why IGreekU'
        ];
    }

    public static function findByEmail($email){
        $user = self::find()
            ->where(['email' => $email])
            ->one();

        return $user;
    }

    public function validatePassword($password){
        $password = md5($password);

        return $password === $this->password;
    }


    /**
     * @inheritdoc
    */
    public function getId(){
        return $this->id;
    }


    /**
      * @inheritdoc
      * not implement this function
    */
    public function getAuthKey(){
        return null;
    }


     /**
      * @inheritdoc
      * not implement this function
    */
    public function validateAuthKey($authKey){
        return null;
    }


     /**
      * @inheritdoc
    */
    public static function findIdentity($id){
        return static::findOne($id);
    }

    /**
     * @inheritdoc
     * not implement this function
    */
    public static function findIdentityByAccessToken($token, $type = null){
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    public function getPosts(){
       return $this->hasMany(Posts::className(), ['user_id' => 'id']);
   }

    public function getJobs(){
       return $this->hasMany(Jobs::className(), ['user_id' => 'id']);
   }
}
