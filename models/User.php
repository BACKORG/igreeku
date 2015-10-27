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
    public $password_repeat;

    public $username;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['college_id'], 'integer'],
            [['college_id', 'firstname', 'lastname', 'email', 'password'], 'required'],
            [['email'], 'email'],
            [['firstname', 'lastname', 'email'], 'string', 'max' => 100],
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
}
