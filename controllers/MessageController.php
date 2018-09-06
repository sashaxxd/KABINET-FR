<?php
/**
 * Created by PhpStorm.
 * User: saha
 * Date: 01.02.2018
 * Time: 8:00
 */

namespace app\controllers;
use app\models\Message;
use Yii;


class MessageController extends AppController
{
    /**
     *  Сообщения
     */


    public function actionIndex($parent_id){


        if(Yii::$app->user->identity->id == $parent_id) { //Если Id пользователя совпадает
            $z = Yii::$app->user->identity->id;  //В переменную заносим это id
            Yii::$app->db->createCommand("UPDATE message SET status=1 WHERE parent_id = $z")
                ->execute(); //При заходе на страницу сообщение меняет статус на прочитанно

            $messages = Message::find()->where(['parent_id' => Yii::$app->user->identity->id])->orderBy([
                'id' => SORT_DESC])->all(); //Вывод сообщений для конкретного юзера






            // Cуммируем два массива из двух таблиц
//            $sender = Employer::find()->where(['login' => $user])->all() + Freelancers::find()->where(['login' => $user])->all(); //Выбираем пользователя из баз что бы
            //предать в виды фотку


            $this->layout = 'main';
            return $this->render('index', [

                    'messages' => $messages,
                ]
            );
        }
        else{
            throw new \yii\web\HttpException(404, 'Такой страницы не существует');
        }

    }

    /**
     * Удаление личных сообщений
     */
    public  function actionMessageDelete(){
        if(Yii::$app->request->isAjax){
            $this->layout = false;

            $id = Yii::$app->request->get('id');

            if(Yii::$app->db->createCommand("Delete From message Where id = $id")->execute()){
                Yii::$app->session->setFlash('success', 'Сообщение удалено'); //Не показывает пока потому что не обновляется флешка с ая
                //кса
            };

            $messages = Message::find()->where(['parent_id' => Yii::$app->user->identity->id])->orderBy([
                'id' => SORT_DESC])->all();


            return $this->render('index', [

                    'messages' => $messages,
                ]
            );
        }

    }

}