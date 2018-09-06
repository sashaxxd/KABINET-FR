<?php
/**
 * Created by PhpStorm.
 * User: Andrey
 * Date: 07.05.2016
 * Time: 10:35
 */
namespace app\components;



use app\models\JobSearch;
use app\models\Spec;
use yii\base\Widget;
use Yii;


class FilterWidget extends Widget
{


    public function run()
    {


        $searchModel = new JobSearch();


        $spec = Spec::find()->where(['<=', 'id', 6])->all();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $model = $dataProvider->sort->attributes;
        return $this -> render('filter', [
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'spec' => $spec,
        ]);
    }


}