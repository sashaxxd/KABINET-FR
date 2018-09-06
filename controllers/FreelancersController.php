<?php
/**
 * User: noutsasha
 * Date: 15.09.2017
 * Time: 22:08
 */

namespace app\controllers;


use app\models\Employer;
use app\models\Freelancers;
use app\models\Message;
use app\models\Spec;
use mdm\admin\models\User;
use Yii;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use zxbodya\yii2\galleryManager\GalleryManagerAction;
use yii\data\Pagination;

class FreelancersController extends AppController
{
    public function actions()
    {
        return [
            'galleryApi' => [
                'class' => GalleryManagerAction::className(),
                // mappings between type names and model classes (should be the same as in behaviour)
                'types' => [
                    'portfolio' => Freelancers::className()
                ]
            ],
        ];
    }

    public function actionIndex()
    {

        $query  = Freelancers::find()->orderBy(['id' => SORT_DESC,]);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 5, 'forcePageParam' => false, 'pageSizeParam' => false ]);
        $freelancers = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('index',[
            'freelancers' => $freelancers,
             'pages' => $pages,
                ]
        );
    }

    public function actionView($id)
    {

        $message = new Message();
        $message->user = Yii::$app->user->identity->username;


        $freelancer = Freelancers::findOne($id);
        if(empty($freelancer )){
            throw new \yii\web\HttpException(404, 'Такой страницы не существует');
        }



        $message->parent_id = Yii::$app->request->get('id');
        if ($message->load(Yii::$app->request->post()) && $message->save()) {
            if(Yii::$app->getRequest()->getIsPjax()) {  //очистка формы после Pjax
                $message = new Message();
            }
             $res = "Cообщение отправлено";

        }

        return $this->render('view',[
                'freelancer' => $freelancer,

                'message' =>  $message,
                'res' =>  $res,
            ]
        );
    }
    
    public function actionProfile($id){

        if(Yii::$app->user->identity->id == $id) {

            $messages = Message::find()->where(['parent_id' => Yii::$app->user->identity->id, 'status' => 0])->count();
            $freelancers = Freelancers::findOne($id);
            $this->setMeta('Профиль| ' . $freelancers->name  .  " $freelancers->lastname "  . ' | ' . $freelancers->special->name);

            $model = $this->findModel($id);
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                $model->image = UploadedFile::getInstance($model, 'image');
                if(!empty($model->image)){
                    $this->findModel($id)->removeImages();
                }


                if($model->image){
                    $model->upload();
                }


                $message = Yii::$app->user->identity->username . " Данные успешно изменены";
                Yii::$app->session->setFlash('success', "$message");
                return $this->redirect(['/cabinet', 'id' => $model->id]);
            }

            $spec = Spec::find()->orderby(['id'=>SORT_DESC])->all();

            $this->layout = 'main';
            return $this->render('profile', [
                    'spec' => $spec,
                    'model' => $model,
                    'freelancers' => $freelancers,
                    'messages' => $messages
                ]
            );
        }
        else{
            throw new \yii\web\HttpException(404, 'Такой страницы не существует');
            return $this->render('profile');
        }
    }

    public function actionCreate()
    {

        if(Freelancers::find()->where(['id' => Yii::$app->user->identity->id])->exists() ||
           Employer::find()->where(['id' => Yii::$app->user->identity->id])->exists()){
            throw new \yii\web\HttpException(404, 'Такой страницы не существует');

        }
        $model = new Freelancers();

        $user = User::findOne(['id' => Yii::$app->user->identity->id]);
        $model->id = $user->id;
        $model->login = $user->username;

        $spec = Spec::find()->orderby(['id'=>SORT_DESC])->all();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['profile', 'id' => Yii::$app->user->identity->id]);
        } else {
            return $this->render('create', [
                'spec' => $spec,
                'model' => $model,
                'user' => $user,
            ]);
        }
    }



    protected function findModel($id)
    {
        if (($model = Freelancers::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }



}