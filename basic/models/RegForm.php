<?php
/**
 * Created by PhpStorm.
 * User: Den4ik
 * Date: 06.12.2015
 * Time: 19:02
 */

namespace app\models;


use yii\base\Model;

class RegForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $status;
    public function rules()
    {
        return [
            [['username', 'email', 'password'],'filter', 'filter' => 'trim'],
            [['username', 'email', 'password'],'required'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['password', 'string', 'min' => 3, 'max' => 255],
            ['username', 'unique',
                'targetClass' => User::className(),
                'message' => 'Этот логин уже используется'],
            ['email', 'email'],
            ['email', 'unique',
                'targetClass' => User::className(),
                'message' => 'Этот email уже используется'],

        ];
    }
    public function attributeLabels()
    {
        return [
            'username' => 'Логин',
            'email' => 'e-mail',
            'password' => 'Пароль'
        ];
    }
    public function reg()
    {
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        /*
        if($this->scenario === 'emailActivation')
            $user->generateSecretKey();*/

        return $user->save() ? $user : null;
    }


    public function sendActivationEmail($user)
    {
        return Yii::$app->mailer->compose('activationEmail', ['user' => $user])
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name.' (���������� �������).'])
            ->setTo($this->email)
            ->setSubject('��������� ��� '.Yii::$app->name)
            ->send();
    }


}