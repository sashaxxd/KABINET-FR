<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "message".
 *
 * @property integer $id
 * @property string $user
 * @property string $message
 * @property integer $parent_id
 */
class Message extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'message';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user', 'message'], 'required'],
            [['message'], 'string'],
            [['parent_id'], 'integer'],
            [['user'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user' => 'User',
            'message' => 'Message',
            'parent_id' => 'Parent ID',
        ];
    }

    public function getFreelancers()
    {
        return $this->hasMany(Freelancers::className(), ['login' => 'user']);
    }

    public function getEmployers()
    {
        return $this->hasMany(Employer::className(), ['login' => 'user']);
    }
}
