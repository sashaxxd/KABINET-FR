<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;
use mdm\admin\models\User as UserForm;

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
class User extends UserForm
{
    /**
     * Расширяем РБАК класс
     */

}