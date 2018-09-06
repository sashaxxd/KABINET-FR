<?php
use yii\helpers\Html;
$this->registerCssFile('/css/job_view.css', ['depends' => ['app\assets\AppAsset']]);
?>
<div id="job_view_content">
    <div id="content">
        <div class="row">
            <div class="col-1">
                <div id="job_view_Text3">
                    <span id="job_view_uid0">Задание</span>
                </div>
                <hr id="Line1">
                <div id="job_view_LayoutGrid3">
                    <div id="LayoutGrid3">
                        <div class="row">
                            <div class="col-1">
                                <div id="job_view_Text4">
                                    <span id="job_view_uid1"><?= Html::encode($job->title) ?></span><span id="job_view_uid2"><strong><br></strong><?= Html::encode($job->text) ?></span>
                                </div>
                            </div>
                            <div class="col-2">
                                <div id="job_view_Text5">
                                    <span id="job_view_uid3"><strong><?= Html::encode($job->price) ?>
                                           <?php if($job->currency == 0): ?>
                                               руб.
                                            <?php else: ?>
                                                $
                                            <?php  endif; ?>
                                        </strong></span>
                                </div>
                                <hr id="Line4">
                                <div id="job_view_Image2">
                                    <?php

                                    $mainImg = $job->em->getImage();



                                    //                                    $sizes = $mainImg->getSizes(); // Array. Original image sizes
                                    //                                    $sizes = $mainImg->getSizesWhen('x60');
                                    //                                    echo '&lt;img width="'.$sizes['width'].'" height="'.$sizes['height'].'" src="'.$mainImg->getUrl('x60').'" />';
                                    //                                    ?>
                                    <?= Html::img('/'.$mainImg->getPathToOrigin(), ['alt' => $job->em->name, 'id'=>"Image2"]) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="job_view_Text1">
                    <span id="job_view_uid4">Предложения</span>
                </div>
                <?php foreach ($offers as $offer): ?>
                <hr id="Line6">
                <div id="job_view_LayoutGrid2">
                    <div id="LayoutGrid2">
                        <div class="row">
                            <div class="col-1">
                                <div id="online"><div id="online_text">online</div></div>
                                <div id="job_view_Image4">
                                    <?php

                                    $mainImg = $offer->fr->getImage();



                                    //                                    $sizes = $mainImg->getSizes(); // Array. Original image sizes
                                    //                                    $sizes = $mainImg->getSizesWhen('x60');
                                    //                                    echo '&lt;img width="'.$sizes['width'].'" height="'.$sizes['height'].'" src="'.$mainImg->getUrl('x60').'" />';
                                    //                                    ?>
                                    <?= Html::img('/'.$mainImg->getPathToOrigin(), ['alt' => $job->em->name, 'id'=>"Image4"]) ?>
                                </div>
                            </div>
                            <div class="col-2">
                                <div id="job_view_Text2">
                                    <span id="job_view_uid5"><?= $offer->fr->login ?></span>
                                </div>
                                <div id="job_view_Text7">
                                    <span id="job_view_uid6"><?= $offer->fr->status ?></span>
                                </div>
                                <div id="job_view_Text6">
                                    <span id="job_view_uid7"><?= $offer->offer ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="job_view_LayoutGrid4">
                    <div id="LayoutGrid4">
                        <div class="row">
                            <div class="col-1">
                                <div id="job_view_FontAwesomeIcon2">
                                    <div id="FontAwesomeIcon2"><i class="fa fa-clock-o">&nbsp;</i></div>
                                </div>
                                <div id="job_view_Text11">
                                    <span id="job_view_uid8"><strong>Сроки дней</strong></span>
                                </div>
                                <div id="job_view_Text8">
                                    <span id="job_view_uid9"><strong><?= $offer->terms ?></strong></span>
                                </div>
                            </div>
                            <div class="col-2">
                                <div id="job_view_FontAwesomeIcon3">
                                    <div id="FontAwesomeIcon3"><i class="fa fa-rouble">&nbsp;</i></div>
                                </div>
                                <div id="job_view_Text12">
                                    <span id="job_view_uid10"><strong>Хочу за работу</strong></span>
                                </div>
                                <div id="job_view_Text9">
                                    <span id="job_view_uid11"><strong><?= $offer->budget ?>

                                            <?php if($offer->currency == 0){
                                              echo 'Руб.';
                                            }
                                            else{
                                             echo "$";
                                            }
                                            ?>

                                        </strong></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="job_view_LayoutGrid5">
                    <div id="LayoutGrid5">
                        <div class="row">
                            <div class="col-1">
                            </div>
                            <div class="col-2">
                            </div>
                        </div>
                    </div>
                </div>

                <?php endforeach; ?>

                <h2><?= $emp ?></h2>

                <div id="offer_button">
                <a href="<?= \yii\helpers\Url::to(['/offers/index', 'id' => $job->id]) ?>" id="Button_offer">ДОБАВИТЬ ВАШЕ ПРЕДЛОЖЕНИЕ</a>
                </div>
            </div>



            <div class="col-2">
                <div id="job_view_Image3">
                    <img src="/images/3a3df9c27b41314cc6e6b8d1e1fd8c29.png" id="Image3" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
