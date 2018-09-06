<?php

namespace app\models;

use Yii;
use yii\base\Model;
use mdm\admin\models\form\Signup as SignupForm;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property integer $isAdmin
 * @property integer $phone
 * @property string $address
 */
class Signup extends SignupForm
{
    public $who = 0;



    public function rules()
    {

        return [
            ['who', 'integer'],
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => 'mdm\admin\models\User', 'message' => 'Этот логин уже занят придумайте другой логин'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => 'mdm\admin\models\User', 'message' => 'Этот емейл уже зарегистрирован'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    public function attributeLabels()
    {
        return [
            'email' => 'E-mail',
            'username' => 'Логин',
            'password' => 'Пароль',
            'who' => 'Вы',

        ];
    }


    public function signup()
    {
        if ($this->validate()) {
            $user = new User();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->who = $this->who;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            if ($user->save()) {
                /**
                 * Делаем привязку вновь зарегиного пользователя к роли БРЭНД в РБАК
                 */
                $auth = Yii::$app->authManager;
                $brandRole = $auth->getRole('BRAND');
                $auth->assign($brandRole, $user->getId());

                return $user;
            }
        }

        return null;
    }
}
