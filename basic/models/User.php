<?php

namespace app\models;

use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use Yii;
use yii\db\Expression;

class User extends ActiveRecord implements \yii\web\IdentityInterface
{

    const STATUS_DELETED = 0;
    const STATUS_NOT_ACTIVE = 1;
    const STATUS_ACTIVE = 10;



    public static function tableName()
    {
        return 'user';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'updatedAtAttribute' => 'date_update',
                'value' => new Expression('now()'),
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'email'], 'required'],
            [['username', 'password', 'email'], 'string', 'max' => 255],
            ['username', 'unique', 'message' => 'Это имя занято.'],
            ['email', 'unique', 'message' => 'Эта почта уже зарегистрирована.'],
            [['authKey'],'string', 'max'=>32]
        ];
    }


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Логин',
            'password' => 'Пароль',
            'email' => 'E-mail',
            'authKey'=>'key',
            'date_create' => 'Дата создания',
            'date_update' => 'дата обновления'
        ];
    }

    public function setPassword($password){
        $this->password = Yii::$app->security->generatePasswordHash($password) ;
    }

    public function validatePassword($password){
        return Yii::$app->security->validatePassword($password, $this->password);
    }

    public static function findByUsername($username){
        return static::findOne([
            'username'=>$username
        ]);
    }

    public static function findByEmailuser($email)
    {
        return static::findOne([
            'email'=>$email
        ]);
    }



    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public function generateAuthKey(){
        $this->authKey = Yii::$app->security->generateRandomString();
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->authKey;
    }

    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }




}
