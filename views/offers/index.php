<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->registerCssFile('/css/offers_index.css', ['depends' => ['app\assets\AppAsset']]);
?>
<div id="offers_Layout_off4">
    <div id="Layout_off4">
        <div class="row">
            <div class="col-1">
                <div id="offers_Text3">
                    <span id="offers_uid0">Ваше предложение</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="offers_Layout_off3">
    <div id="Layout_off3">
        <div class="row">
            <div class="col-1">
                <div id="offers_Layout_off2">
                    <div id="Layout_off2">
                        <div class="row">
                            <div class="col-1">
                                <div id="offers_Text1">
                                    <span id="offers_uid1">При использовании прямой оплаты и работая вне сайта вы самостоятельно регулируете все возникающие претензии.<br><br></span><span id="offers_uid2"><strong>Как правильно?</strong></span><span id="offers_uid3"><br>Для безопасной работы над заданием и защиты от мошенников рекомендуем использовать рабочую область и безопасную сделку на сайте.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="offers_job_form">
    <div id="job_form">
        <div class="row">
            <div class="col-1">
                <div id="offers_job_container_form">
                    <div id="job_container_form">
                        <div class="row">
                            <?php $form = ActiveForm::begin()?>
                            <div class="col-1">

                                <?= $form->field($offer, 'offer')->textarea(['id' => 'TextArea1_job',
                                    'placeholder' => 'Введите ваше предложение', 'rows' => '11', 'cols' => '92'])->label(false)?>

                            </div>
                            <div class="col-2">

                                <?= $form->field($offer, 'budget')->textInput(['id' => 'budget',
                                    'placeholder' => 'Бюджет'])->label(false)?>


                                <?= $form->field($offer, 'currency')->dropDownList([ '0' => 'Руб.', '1' => '$',],
                                    ['prompt'=> 'Валюта','id'=>'currency'])->label(false); ?>



                                <?= $form->field($offer, 'terms')->textInput(['id' => 'terms',
                                    'placeholder' => 'Сроки (дней)'])->label(false)?>


                                <?= Html::submitButton('Опубликовать', [ 'id' => "Button_job_public", 'class' => 'btn', ]) ?>
                            </div>
                            <?php ActiveForm::end()?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="offers_Layout_off5">
    <div id="Layout_off5">
        <div class="row">
            <div class="col-1">
                <div id="offers_Layout_off6">
                    <div id="Layout_off6">
                        <div class="row">
                            <div class="col-1">
                                <div id="offers_Text2">
                                    <span id="offers_uid4"><strong>Фрилансерам</strong> </span><span id="offers_uid5">запрещается в заявках и обсуждении проекта демпинговать, то есть предлагать заказчику выполнить предложенную работу за сумму ниже той, что определена самим заказчиком в бюджете проекта. За нарушение аккаунт может быть заблокирован и его предложение удалено без предупреждения.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>