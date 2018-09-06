<?php

namespace app\models;

use Yii;
use app\models\Message;
use zxbodya\yii2\galleryManager\GalleryBehavior;
use Imagine\Image\Box;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "Freelancers".
 *
 * @property integer $id
 * @property string $name
 * @property string $lastname
 * @property string $spec
 * @property string $login
 * @property string $date
 * @property string $status
 */
class Freelancers extends ActiveRecord
{
    public $image;

    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ],
            /**
             * Загрузка галереи
             */
            'galleryBehavior' => [
                'class' => GalleryBehavior::className(),
                'type' => 'portfolio',
                'extension' => 'jpg',
                'directory' => Yii::getAlias('@webroot') . '/uploads',
                'url' => Yii::getAlias('@web') . '/uploads',
                'versions' => [
                    'small' => function ($img) {
                        /** @var ImageInterface $img */
                        return $img
                            ->copy()
                            ->thumbnail(new Box(200, 200));
                    },
                    'medium' => function ($img) {
                        /** @var ImageInterface $img */
                        $dstSize = $img->getSize();
                        $maxWidth = 800;
                        if ($dstSize->getWidth() > $maxWidth) {
                            $dstSize = $dstSize->widen($maxWidth);
                        }
                        return $img
                            ->copy()
                            ->resize($dstSize);
                    },
                ]
            ]
        ];

    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Freelancers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'lastname', 'spec'], 'required'],
            [['date'], 'date', 'format' => 'php:Y-m-d'],
            [['date'], 'default', 'value' => date('Y-m-d')],
//            [['time'], 'date', 'format' => 'php:h:i:s'],
//            [['time'], 'default', 'value' => date('h:i:s')],
            [['name', 'lastname', 'spec',  'status'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'lastname' => 'Фамилия',
            'spec' => 'Специализация',
            'login' => 'Login',
            'date' => 'Date',
            'status' => 'Status',
            'image' => 'Аватар'
        ];
    }


    public function getMessage(){
        return $this->hasMany(Message::className(), ['parent_id' => 'id']);
    }

    public function getSpecial(){
        return $this->hasOne(Spec::className(), ['parent_id' => 'spec']);
    }

    public  function  upload(){
        if($this->validate()){
            $path = 'upload/store/'. $this->image->baseName . '.' . $this->image->extension;
            $this->image->saveAs($path);
            $this->attachImage($path);
            @unlink($path);
            return true;
        }
        else{
            return false;
        }
    }
}
