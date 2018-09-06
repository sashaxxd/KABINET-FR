<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div id="wb_content">
    <div id="content">
        <div class="row">
            <div class="col-1">
                <div id="wb_Text3">
                    <span id="wb_uid3">Личный кабинет</span>
                </div>
                <hr id="Line1">
                <div id="wb_LayoutGrid3">
                    <div id="LayoutGrid3">
                        <div class="row">
                            <div class="col-1">
                                <div id="wb_Image2">

                                    <?php

                                    $mainImg = $freelancer->getImage();
                                    //                                    $sizes = $mainImg->getSizes(); // Array. Original image sizes
                                    //                                    $sizes = $mainImg->getSizesWhen('x60');
                                    //                                    echo '&lt;img width="'.$sizes['width'].'" height="'.$sizes['height'].'" src="'.$mainImg->getUrl('x60').'" />';
                                    //                                    ?>
                                    <?= Html::img('/'.$mainImg->getPathToOrigin(), ['alt' => $freelancers->name, 'id'=>"Image2"]) ?>
                                </div>
                            </div>
                            <div class="col-2">
                                <div id="wb_Text4">
                                    <span id="wb_uid4"><?= $freelancer->name ?> <?= $freelancer->lastname ?></span><span id="wb_uid5"><strong> <?= $freelancer->login ?><br>Специализация: </strong></span><span id="wb_uid6"><strong><?= $freelancer->special->name ?><br></strong></span><span id="wb_uid7">Дата регистрации: </span><span id="wb_uid8"><strong><?= $freelancer->date ?></strong></span><span id="wb_uid9"><strong><br></strong></span>
                                </div>
                            </div>
                            <div class="col-3">
                                <div id="wb_Text5">
                                    <span id="wb_uid10"><strong><?= $freelancer->status ?></strong></span>
                                </div>
                                <div id="wb_FontAwesomeIcon2">
                                    <div id="FontAwesomeIcon2"><i class="fa fa-plus">&nbsp;</i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr id="Line2">
                <div id="wb_Text8">
                    <span id="wb_uid11">Портфолио</span>
                </div>
            </div>
            <div class="col-2">
                <div id="wb_CssMenu1">
                    <ul>
                        <li class="firstmain"><a href="<?= \yii\helpers\Url::to(['freelancers/profile', 'id' => $freelancer->id]) ?>" target="_self">Профиль</a>
                        </li>
                        <li><a href="<?= \yii\helpers\Url::to(['/message/'.$freelancer->id ]) ?> " target="_self" >Сообщения

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
<div id="wb_LayoutGrid2">
    <div id="LayoutGrid2">
        <div class="row">
            <div class="col-1">
                <div id="wb_LayoutGrid1">
                    <div id="LayoutGrid1">
                        <div class="row">
                            <?php   $i = 0;    foreach($freelancer->getBehavior('galleryBehavior')->getImages() as $image):?>
                                <?php  $i++; ?>
                                <div class="col-1">
                                    <div id="wb_Text9">
                                        <span id="wb_uid6"><strong></strong><?= $image->name?></strong></span>
                                    </div>
                                    <div id="wb_Image4">
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