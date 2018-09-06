<?php

namespace app\modules\admin\models;


use Yii;

/**
 * This is the model class for table "freelancers".
 *
 * @property integer $id
 * @property string $name
 * @property string $lastname
 * @property string $spec
 * @property string $login
 * @property string $date
 * @property string $status
 */
class Freelancers extends \yii\db\ActiveRecord
{

    public $image;

    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'freelancers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'lastname', 'spec', 'login', 'date', 'status'], 'required'],
            [['date'], 'safe'],
            [['name', 'lastname', 'spec', 'login', 'status'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'lastname' => 'Lastname',
            'spec' => 'Spec',
            'login' => 'Login',
            'date' => 'Date',
            'status' => 'Status',
        ];
    }

  
}
