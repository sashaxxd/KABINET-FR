<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "offers".
 *
 * @property string $id
 * @property string $freelancer
 * @property int $terms
 * @property int $budget
 * @property string $offer
 */
class Offers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'offers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['freelancer', 'terms', 'budget', 'offer', 'currency'], 'required'],
            [['currency'], 'string'],
            [['terms', 'budget', 'freelancer'], 'integer'],
            [['offer'], 'string'],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'freelancer' => 'Freelancer',
            'terms' => 'Terms',
            'budget' => 'Budget',
            'offer' => 'Offer',
        ];
    }

    public function getFr()
    {
        return $this->hasOne(Freelancers::className(), ['id' => 'freelancer']);
    }

}
