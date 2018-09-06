<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->registerCssFile('/css/job_el.css', ['depends' => ['app\assets\AppAsset']]);
?>
<!-- Создать задание -->

<div id="el_Text3">
    <span id="el_uid0">Изменить задание <?= $job->title?></span>
</div>
<hr id="Line1">
<div id="el_job_container_form">
    <div id="job_container_form">
        <div class="row">
            <?php $form = ActiveForm::begin(['options' => ['data-pjax' => true]])?>
            <div class="col-1">


                <?= $form->field($job, 'title', ['inputOptions' => ['value' => Html::encode($job->title)]])->textInput(['id' => 'job_title',
                    'placeholder' => 'Введите заголовок задания', ])->label(false)?>

                <?php

                $spec = \app\models\Spec::find()->all();
                // формируем массив, с ключем равным полю 'id' и значением равным полю 'name'
                $items = \yii\helpers\ArrayHelper::map($spec,'id','name');
                $params = [
                    'prompt' => 'Выбрать специалиста',
                    'id'=>'spec'
                ];
                ?>

                <?= $form->field($job, 'spec')->dropDownList($items, $params)->label(false); ?>

                <?= $form->field($job, 'text')->textarea(['id' => 'TextArea1_job',
                    'placeholder' => 'Введите описание задания', 'rows' => '11', 'cols' => '92'])->label(false)?>


            </div>
            <div class="col-2">

                <?= $form->field($job, 'currency')->dropDownList([ '0' => 'Руб.', '1' => '$',],
                    ['prompt'=> 'Валюта','id'=>'currency'])->label(false); ?>


                <?= $form->field($job, 'price')->textInput(['id' => 'budget',
                    'placeholder' => 'Бюджет'])->label(false)?>

                <?= $form->field($job, 'status')->dropDownList([ '0' => 'ДЛЯ PROFI', '1' => 'ДЛЯ ВСЕХ',],
                    ['id'=>'status'])->label(false); ?>

                <?= Html::submitButton('Изменить', [ 'id' => "Button_job_public", 'class' => 'btn', ]) ?>

                <?= $form->field($job, 'employer')->hiddenInput()->label(false)?>

                <?= $form->field($job, 'date')->hiddenInput()->label(false)?>

                <?= $form->field($job, 'time')->hiddenInput()->label(false)?>
            </div>
            <?php ActiveForm::end()?>
        </div>
    </div>
</div>

<!-- Конец создать задание -->