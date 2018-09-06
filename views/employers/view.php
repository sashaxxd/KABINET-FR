<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
$this->registerCssFile('/css/employers_view.css', ['depends' => ['app\assets\AppAsset']]);
?>
<div id="employers_view_content">
    <div id="content">
        <div class="row">
            <div class="col-1">
                <div id="employers_view_Text3">
                    <span id="employers_view_uid3">Заказчик <?= $employer->name ?> <?= $employer->lastname ?></span>
                </div>
                <hr id="Line1">
                <div id="employers_view_LayoutGrid3">
                    <div id="LayoutGrid3">
                        <div class="row">
                            <div class="col-1">
                                <div id="employers_view_Image2">
<!--                                    <img src="/images/sm_f_01158e63badb8a1e.jpg" id="Image2" alt="">-->
                                    <?php

                                    $mainImg = $employer->getImage();
                                    //                                    $sizes = $mainImg->getSizes(); // Array. Original image sizes
                                    //                                    $sizes = $mainImg->getSizesWhen('x60');
                                    //                                    echo '&lt;img width="'.$sizes['width'].'" height="'.$sizes['height'].'" src="'.$mainImg->getUrl('x60').'" />';
                                    //                                    ?>
                                    <?= Html::img('/'.$mainImg->getPathToOrigin(), ['alt' => $employer->name, 'id'=>"Image2"]) ?>
                                </div>
                            </div>
                            <div class="col-2">
                                <div id="employers_view_Text4">
                                    <span id="employers_view_uid4"></span><span id="employers_view_uid5"><strong><?= $employer->login ?><br></strong></span><span id="employers_view_uid7">Дата регистрации: </span><span id="employers_view_uid8"><strong><?= $employer->date ?></strong></span><span id="employers_view_uid9"><strong><br></strong></span>
                                </div>
                            </div>
                            <div class="col-3">
                                <div id="employers_view_Text5">
                                    <span id="employers_view_uid10"><strong><?= $employer->status ?></strong></span>
                                </div>
                                <div id="employers_view_FontAwesomeIcon2">
                                    <div id="FontAwesomeIcon2"><i class="fa fa-plus">&nbsp;</i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr id="Line2">
               <?php if (!Yii::$app->user->isGuest && Yii::$app->user->identity->username !== $employer->login ): ?>

                <?php \yii\widgets\Pjax::begin() ?>
                <?php $form = ActiveForm::begin([   'id' => $widget_id.'-form',
                    'method' => 'POST',
                    'action' => '',
                    'enableAjaxValidation' => false,
                    'options' => [ 'autocomplete' => 'off', 'data-pjax' => true]
                ])?>

<!--                --><?//= $form->field($message, 'user')?>


                <?= $form->field($message, 'message')->textarea(['rows' => 10, 'placeholder' => 'Ввведите сообщение'])?>





                <?= Html::submitButton('Написать сообщение фрилансеру '.$employer->login, ['class' => 'btn btn-profile']) ?>
                <?php ActiveForm::end()?>


                    <span id="red_mes" style="color: red; font-size: 12px; font-weight: bold;"> <?= $res ?></span>

                <?php \yii\widgets\Pjax::end() ?>

                <?php  endif; ?>




        </div>
    </div>
</div>
</div>
