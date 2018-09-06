<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use zxbodya\yii2\galleryManager\GalleryManager;
$this->registerCssFile('/css/profile_freelance.css', ['depends' => ['app\assets\AppAsset']]);//Кидаем ниже файлов в ассете
?>
<div id="profile_freelance_content">
    <div id="content">
        <div class="row">
            <div class="col-1">
                <div id="profile_freelance_Text3">
                    <span id="profile_freelance_uid3">Профиль</span>
                </div>
                <hr id="Line1">
                <div id="profile_freelance_prof">
                    <div id="prof">
                        <div class="row">
                            <div class="col-1">
                                <div id="profile_freelance_Image2">
<!--                                    <img src="/images/sm_f_01158e63badb8a1e.jpg" id="Image2" alt="">-->
                                    <?php

                                    $mainImg = $freelancers->getImage();
//                                    $sizes = $mainImg->getSizes(); // Array. Original image sizes
//                                    $sizes = $mainImg->getSizesWhen('x60');
//                                    echo '&lt;img width="'.$sizes['width'].'" height="'.$sizes['height'].'" src="'.$mainImg->getUrl('x60').'" />';
//                                    ?>
                                    <?= Html::img('/'.$mainImg->getPathToOrigin(), ['alt' => $freelancers->name, 'id'=>"Image2"]) ?>

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

                               <?php $items = ArrayHelper::map($spec,'id','name');
                                $params = [
                                'prompt' => 'Выбрать специальность'
                                ] ?>


                                <?= $form->field($model, 'spec')->dropDownList($items,$params);?>


                                <?= Html::submitButton('Изменить', ['class' => 'btn btn-profile']) ?>
                                <?php ActiveForm::end()?>
                            </div>
                            <div class="col-3">
                                <div id="profile_freelance_Text5">
                                    <span id="profile_freelance_uid4"><strong>PROFI</strong></span>
                                </div>
                                <div id="profile_freelance_FontAwesomeIcon2">
                                    <div id="FontAwesomeIcon2"><i class="fa fa-plus">&nbsp;</i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr id="Line2">
                <div id="profile_freelance_Text8">
                    <span id="profile_freelance_uid5">Портфолио</span>
                </div>
            </div>
            <div class="col-2">
                <div id="profile_freelance_CssMenu1">
                    <ul>
                        <li class="firstmain"><a href="<?= \yii\helpers\Url::to('/cabinet/'.Yii::$app->user->identity->id) ?>" target="_self">Кабинет</a>
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
<div id="profile_freelance_LayoutGrid2">
    <div id="LayoutGrid2">
        <div class="row">
            <div class="col-1">
                <div id="profile_freelance_LayoutGrid1">
                    <div id="LayoutGrid1">
                        <div class="row">
                            <?php  $i = 0;    foreach($model->getBehavior('galleryBehavior')->getImages() as $image):?>
                                <?php  $i++; ?>
                            <div class="col-1">
                                <div id="profile_freelance_Text9">
                                    <span id="profile_freelance_uid6"><strong>
                                            <?= $image->name ?>
                                        </strong></span>
                                </div>
                                <div id="profile_freelance_Image4">
<!--                                    <img src="/images/2%2832%29.jpg" id="Image4" alt="">-->
                                    <?= Html::img($image->getUrl('medium'), ['alt' => '', 'class' => 'img_portfolio', 'src' => $image->getUrl('medium')]) ?>
                                </div>
                            </div>
                                <?php    if ($i % 3 == 0): ?>

                                    <hr id="Line2">

                                <?php endif;   ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <br> <br> <br>
                <hr id="Line2">
                <div id="profile_freelance_Text8">
                    <span id="profile_freelance_uid5">Редактировать портфолио</span>
                </div>
                <div id="portfolio" style="margin-top: 40px;">
                    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

                    <?php
                    if ($model->isNewRecord) {
                        echo 'Cначала создайте запись потом сможете создать для нее галерею';
                    } else {
                        echo GalleryManager::widget(
                            [
                                'model' => $model,
                                'behaviorName' => 'galleryBehavior',
                                'apiRoute' => 'galleryApi'
                            ]
                        );
                    }

                    ?>


                    <?php ActiveForm::end(); ?>
                </div>
            </div>
            <div class="col-2">

            </div>

        </div>

    </div>

</div>
