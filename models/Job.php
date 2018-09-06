<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "job".
 *
 * @property string $id
 * @property string $title
 * @property string $text
 * @property int $price
 * @property string $currency
 * @property int $budget
 * @property string $date
 * @property string $time
 * @property int $status
 * @property int $employer
 */
class Job extends \yii\db\ActiveRecord
{


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'job';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'text', 'price', 'currency', 'spec'  ], 'required'],


            [['text', 'currency'], 'string'],
            [['price', 'status', 'employer'], 'integer'],
            [['date'], 'date', 'format'=>'php:Y-m-d'],
            [['date'], 'default', 'value' => date('Y-m-d')],
            [['time'], 'time', 'format'=>'php:H:i:s'],
            [['time'], 'default', 'value' => date('H:i:s')],
            [['title'], 'string', 'max' => 255],
            [['spec'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок задания',
            'text' => 'Описание задания',
            'date' => 'Date',
            'time' => 'Time',
            'status' => 'Status',
            'employer' => 'Employer',
            'currency' => 'Валюта',
             'spec' => 'Cпециалист',
            'price' => 'Бюджет',
        ];
    }

    public function getEm()
    {
        return $this->hasOne(Employer::className(), ['id' => 'employer']);
    }



}
