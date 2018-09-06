<?php


namespace app\controllers;
use app\models\Employer;
use app\models\Freelancers;
use app\models\Job;
use Yii;
use app\models\Message;
use yii\data\Pagination;
use yii\web\NotFoundHttpException;

class CabinetController extends AppController
{



    public function actionIndex($id)
    {

        if (Yii::$app->user->identity->id == $id) {

            $messages = Message::find()->where(['parent_id' => Yii::$app->user->identity->id, 'status' => 0])->count();



            if(Yii::$app->user->identity->who == 0){
                $freelancer = Freelancers::findOne($id);
                if (empty($freelancer)) {
                    throw new \yii\web\HttpException(404, 'Такой страницы не существует');
                }
                return $this->render('freelancer', [
                        'freelancer' => $freelancer,
                        'messages' => $messages
                    ]
                );
            }
            else {
                $employer = Employer::findOne($id);
                $job = new Job();
                $job->employer = Yii::$app->user->identity->id;

                $query  = Job::find()->where(['employer' => Yii::$app->user->identity->id])->orderBy(['id' => SORT_DESC,]);
                $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 5, 'forcePageParam' => false, 'pageSizeParam' => false ]);
                $job_history = $query->offset($pages->offset)->limit($pages->limit)->all();
                if ($job->load(Yii::$app->request->post()) && $job->save()) {

                    $message = Yii::$app->user->identity->username . " Задание успешно опубликовано";
                    Yii::$app->session->setFlash('success', "$message");
                    return $this->redirect(['cabinet/index', 'id' => Yii::$app->user->identity->id]);
                }




                if (empty($employer)) {
                    throw new \yii\web\HttpException(404, 'Такой страницы не существует');
                }
                return $this->render('employer', [
                        'employer' => $employer,
                        'messages' => $messages,
                        'job' => $job,
                        'job_history' => $job_history,
                        'pages' => $pages,
                    ]
                );
            }


        }
        else{
            throw new \yii\web\HttpException(404, 'Такой страницы не существует');

        }
    }

    public function actionUpdate($id){
        $job = $this->findModel($id);

        if ($job->load(Yii::$app->request->post()) && $job->save()) {
            $message = Yii::$app->user->identity->username . " Задание изменено";
            Yii::$app->session->setFlash('success', "$message");
            return $this->redirect(['cabinet/index', 'id' => Yii::$app->user->identity->id]);

        } else {
            return $this->render('job-update', [
                'job' => $job,
            ]);
        }


    }


    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        $message = Yii::$app->user->identity->username . " Задание удалено";
        Yii::$app->session->setFlash('success', "$message");
        return $this->redirect(['cabinet/index', 'id' => Yii::$app->user->identity->id]);
    }


    protected function findModel($id)
    {
        if (($model = Job::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    




}