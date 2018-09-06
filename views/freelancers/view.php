<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
$this->registerCssFile('/css/freelancer_view.css', ['depends' => ['app\assets\AppAsset']]);//Кидаем ниже файлов в ассете
?>
<div id="freelancer_view_content">
    <div id="content">
        <div class="row">
            <div class="col-1">
                <div id="freelancer_view_Text3">
                    <span id="freelancer_view_uid3">Фрилансер <?= $freelancer->name ?> <?= $freelancer->lastname ?></span>
                </div>
                <hr id="Line1">
                <div id="freelancer_view_LayoutGrid3">
                    <div id="LayoutGrid3">
                        <div class="row">
                            <div class="col-1">
                                <div id="freelancer_view_Image2">
<!--                                    <img src="/images/sm_f_01158e63badb8a1e.jpg" id="Image2" alt="">-->
                                    <?php

                                    $mainImg = $freelancer->getImage();
                                    //                                    $sizes = $mainImg->getSizes(); // Array. Original image sizes
                                    //                                    $sizes = $mainImg->getSizesWhen('x60');
                                    //                                    echo '&lt;img width="'.$sizes['width'].'" height="'.$sizes['height'].'" src="'.$mainImg->getUrl('x60').'" />';
                                    //                                    ?>
                                    <?= Html::img('/'.$mainImg->getPathToOrigin(), ['alt' => $freelancer->name, 'id'=>"Image2"]) ?>
                                </div>
                            </div>
                            <div class="col-2">
                                <div id="freelancer_view_Text4">
                                    <span id="freelancer_view_uid4"></span><span id="freelancer_view_uid5"><strong><?= $freelancer->login ?><br>Специализация: </strong></span><span id="freelancer_view_uid6"><strong><?= $freelancer->special->name ?><br></strong></span><span id="freelancer_view_uid7">Дата регистрации: </span><span id="freelancer_view_uid8"><strong><?= $freelancer->date ?></strong></span><span id="freelancer_view_uid9"><strong><br></strong></span>
                                </div>
                            </div>
                            <div class="col-3">
                                <div id="freelancer_view_Text5">
                                    <span id="freelancer_view_uid10"><strong><?= $freelancer->status ?></strong></span>
                                </div>
                                <div id="freelancer_view_FontAwesomeIcon2">
                                    <div id="FontAwesomeIcon2"><i class="fa fa-plus">&nbsp;</i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr id="Line2">
               <?php if (!Yii::$app->user->isGuest && Yii::$app->user->identity->username !== $freelancer->login ): ?>

                <?php \yii\widgets\Pjax::begin() ?>
                <?php $form = ActiveForm::begin([   'id' => $widget_id.'-form',
                    'method' => 'POST',
                    'action' => '',
                    'enableAjaxValidation' => false,
                    'options' => [ 'autocomplete' => 'off', 'data-pjax' => true]
                ])?>

<!--                --><?//= $form->field($message, 'user')?>


                <?= $form->field($message, 'message')->textarea(['rows' => 10, 'placeholder' => 'Ввведите сообщение'])?>





                <?= Html::submitButton('Написать сообщение фрилансеру '.$freelancer->login, ['class' => 'btn btn-profile']) ?>
                <?php ActiveForm::end()?>


                    <span id="red_mes" style="color: red; font-size: 12px; font-weight: bold;"> <?= $res ?></span>

                <?php \yii\widgets\Pjax::end() ?>

                <?php  endif; ?>


                <div id="freelancer_view_Text8">
                    <span id="freelancer_view_uid11">Портфолио </span>
                </div>
            </div>
            <div class="col-2">
<!--                <div id="freelancer_view_CssMenu1">-->
<!--                    <ul>-->
<!--                        <li class="firstmain"><a href="#" target="_self">&#1055;&#1088;&#1086;&#1092;&#1080;&#1083;&#1100;</a>-->
<!--                        </li>-->
<!--                        <li><a href="#" target="_self">&#1057;&#1086;&#1086;&#1073;&#1097;&#1077;&#1085;&#1080;&#1103;</a>-->
<!--                        </li>-->
<!--                        <li><a href="#" target="_self">&#1047;&#1072;&#1082;&#1072;&#1079;&#1099;</a>-->
<!--                        </li>-->
<!--                    </ul>-->
<!--                </div>-->
            </div>
        </div>
    </div>
</div>
<div id="freelancer_view_LayoutGrid2">
    <div id="LayoutGrid2">
        <div class="row">
            <div class="col-1">
                <div id="freelancer_view_LayoutGrid1">
                    <div id="LayoutGrid1">
                        <div class="row">
                            <?php   $i = 0;    foreach($freelancer->getBehavior('galleryBehavior')->getImages() as $image):?>
                                <?php  $i++; ?>
                                <div class="col-1">
                                    <div id="freelancer_view_Text9">
                                        <span id="freelancer_view_uid6"><strong></strong><?= $image->name?></strong></span>
                                    </div>
                                    <div id="freelancer_view_Image4">
                                        <!--                                    <img src="/images/2%2832%29.jpg" id="Image4" alt="">-->
                                        <?= Html::img($image->getUrl('medium'), ['alt' => '', 'class' => 'img_portfolio', 'src' => $image->getUrl('medium')]) ?>
                                    </div>
                                </div>
                                <?php    if ($i % 3 == 0): ?>

                                    <hr id="Line2">

                                <?php endif;   ?>
                            <?php endforeach;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-2">
            </div>
        </div>
    </div>
</div>