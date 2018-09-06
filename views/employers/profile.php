<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use zxbodya\yii2\galleryManager\GalleryManager;

$this->registerCssFile('/css/profile_employers.css', ['depends' => ['app\assets\AppAsset']]);//Кидаем ниже файлов в ассете

?>
<div id="profile_employers_content">
    <div id="content">
        <div class="row">
            <div class="col-1">
                <div id="profile_employers_Text3">
                    <span id="profile_employers_uid3">Профиль</span>
                </div>
                <hr id="Line1">
                <div id="profile_employers_prof">
                    <div id="prof">
                        <div class="row">
                            <div class="col-1">
                                <div id="profile_employers_Image2">
<!--                                    <img src="/images/sm_f_01158e63badb8a1e.jpg" id="Image2" alt="">-->
                                    <?php

                                    $mainImg = $employers->getImage();
//                                    $sizes = $mainImg->getSizes(); // Array. Original image sizes
//                                    $sizes = $mainImg->getSizesWhen('x60');
//                                    echo '&lt;img width="'.$sizes['width'].'" height="'.$sizes['height'].'" src="'.$mainImg->getUrl('x60').'" />';
//                                    ?>
                                    <?= Html::img('/'.$mainImg->getPathToOrigin(), ['alt' => $employers->name, 'id'=>"Image2"]) ?>

                                </div>
                            </div>
                            <div class="col-2">
                                <div id="date_reg"><strong>Дата регистрации:</strong> <?= $model->date;?>

                                </div>
                                <br>

                                <?php $form = ActiveForm::begin(['options' => ['data-pjax' => true]])?>

                                <?= $form->field($model, 'name')?>


                                <?= $form->field($model, 'lastname')?>



                                <?= $form->field($model, 'image')->fileInput() ?>




                                <?= Html::submitButton('Изменить', ['class' => 'btn btn-profile']) ?>
                                <?php ActiveForm::end()?>
                            </div>
                            <div class="col-3">
                                <div id="profile_employers_Text5">
                                    <span id="profile_employers_uid4"><strong>PROFI</strong></span>
                                </div>
                                <div id="profile_employers_FontAwesomeIcon2">
                                    <div id="FontAwesomeIcon2"><i class="fa fa-plus">&nbsp;</i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-2">
                <div id="profile_employers_CssMenu1">
                    <ul>
                        <li class="firstmain"><a href="<?= \yii\helpers\Url::to(['employers/profile', 'id' => $employer->id]) ?>" target="_self">Профиль</a>
                        </li>
                        <li><a href="<?= \yii\helpers\Url::to(['/message/'.$model->id ]) ?> " target="_self" >Сообщения

                                <?php
                                if($messages > 0): ?>
                                    <div id="circle">
                                        <?= $messages; ?>
                                    </div>
                                <?php endif; ?>


                            </a>

                        </li>
                        <li><a href="#" target="_self">Заказы</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

