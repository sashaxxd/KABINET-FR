<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\Pjax;
$this->registerJsFile('/js/main.js');
//$this->title = 'Авторизация';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>


    <?php Pjax::begin(['id' => 'my-pjax']); ?>
    <?php $form = ActiveForm::begin(['options' => ['data-pjax' => true]])?>

        <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('Логин') ?>

        <?= $form->field($model, 'password')->passwordInput()->label('Пароль')  ?>

        <?= $form->field($model, 'rememberMe')->checkbox([

        ])->label('Запомнить меня') ?>

        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?= Html::submitButton('Вход', ['class' => 'btn auth', 'name' => 'login-button']) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>
    <?php Pjax::end(); ?>

</div>

