<?php

namespace app\controllers;

use app\models\Employer;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\Login;
use app\models\Signup;
use app\models\ContactForm;
use app\models\Freelancers;
use app\models\User;

class SiteController extends Controller
{



    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        $this->layout = false;

        if (!Yii::$app->getUser()->isGuest) {

            return $this->goHome();
        }

        $model = new Login();
        if ($model->load(Yii::$app->getRequest()->post()) && $model->login()) {

            /**
             * Делаем проверку на существование пользователя в базе данных если существует редирект на профиль
             */
            if (Freelancers::find()->where(['id' => Yii::$app->user->identity->id])->exists() ||
                Employer::find()->where(['id' => Yii::$app->user->identity->id])->exists()) {
                $message = Yii::$app->user->identity->username . " здравствуйте вы успешно авторизировались на сайте";
                Yii::$app->session->setFlash('success', "$message");
                // запись существует
                if(Yii::$app->user->identity->who == 0){
                    return $this->redirect(['/freelancers/profile/' .  Yii::$app->user->identity->id ]);
                }
                else{
                    return $this->redirect(['/employers/profile/' .  Yii::$app->user->identity->id ]);
                }

            }
            /**
             *  Иначе редиректим на заполнение профиля
             */
            else{
                $message = Yii::$app->user->identity->username . " здравствуйте вы успешно авторизировались на сайте, заполните пожалуйста профиль";
                Yii::$app->session->setFlash('success', "$message");
                if(Yii::$app->user->identity->who == 0) {
                    return $this->redirect(['freelancers/create']);
                }
                else{
                    return $this->redirect(['employers/create']);
                }
            }
        } else {
            return $this->renderAjax('login', [
                'model' => $model,
            ]);
        }
    }


    public function actionSignup()
    {

        $model = new Signup();

        if ($model->load(Yii::$app->getRequest()->post())) {
            if ($user = $model->signup()) {
                


                $message = Yii::$app->user->identity->username . " здравствуйте вы успешно зарегистрировались на сайте, теперь можете войти";
                Yii::$app->session->setFlash('success', "$message");
                return $this->goHome();
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->getUser()->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
