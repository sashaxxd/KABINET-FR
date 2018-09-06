<?php
namespace app\controllers;


use app\models\Job;
use app\models\JobSearch;
use app\models\Offers;
use Yii;
use app\models\Spec;

class JobController extends AppController{


    public function actionIndex(){

            $searchModel = new JobSearch();
            $spec = Spec::find()->all();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);



        if($searchModel->load(Yii::$app->request->post())){
            $session = Yii::$app->session;
            $session->open();
            for($i = 0; $i <= 24; $i++ ) {
                $session['checkbox'.$i] = Yii::$app->request->post('JobSearch')['spec'.$i];
                $session['spec'.$i] = Yii::$app->request->post('JobSearch')['spec'.$i];

            }


            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        }


        return $this->render('index',[

            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'spec' => $spec,
//            'pages' => $pages
        ]);
    }

    public function actionView($id){

        $job = Job::findOne($id);
        $offers = Offers::find()->where(['parent_id' => $id])->all();
        if(empty($job)){
            throw new \yii\web\HttpException(404, 'Такой страницы не существует');
        }
        if(empty($offers )){
            $emp =  'Пока предложений нет';
        }
        return $this->render('view',[
           'job' => $job,
            'offers' => $offers,
            'emp' => $emp
        ]);

    }
}