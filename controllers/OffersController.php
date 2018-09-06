<?php

namespace app\controllers;

use app\models\Offers;
use Yii;


class OffersController extends AppController
{
    public function actionIndex()
    {

            $id = Yii::$app->request->get('id');
            $offer = new Offers();
            $offer->freelancer = Yii::$app->user->identity->id;
            $offer->parent_id = $id;
        if (Yii::$app->user->identity->who == 0 && (empty(Offers::find()->where(['freelancer' => Yii::$app->user->identity->id, 'parent_id' => $id])->exists()))) {
            if ($offer->load(Yii::$app->request->post()) && $offer->save()) {
                $message = Yii::$app->user->identity->username . "Ваше предложение опубликованно";
                Yii::$app->session->setFlash('success', "$message");

                return $this->redirect(['cabinet/index', 'id' => Yii::$app->user->identity->id]);
            }
        }
        else if (!empty(Offers::find()->where(['freelancer' => Yii::$app->user->identity->id, 'parent_id' => $id])->exists())){
            $message = Yii::$app->user->identity->username . " Вы уже оставили предложение по этому заданию";
            Yii::$app->session->setFlash('error', "$message");
        }
        else{
            $message = Yii::$app->user->identity->username . "Что бы оставлять предложения зарегистрируйтесь как фрилансер";
            Yii::$app->session->setFlash('error', "$message" . " <a href=\"/site/signup\">ЗАРЕГИСТРИРОВАТЬСЯ</a>");
        }

            return $this->render('index', [
                'offer' => $offer,
            ]);
        }


}
