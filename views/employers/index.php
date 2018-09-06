<?php
use yii\helpers\Html;
$this->registerCssFile('/css/employers_index.css', ['depends' => ['app\assets\AppAsset']]);//Кидаем ниже файлов в ассете
?>
<div id="employers_index_content">
    <div id="content">
        <div class="row">
            <div class="col-1">
                <div id="employers_index_Text3">
                    <span id="employers_index_uid3">Каталог работодателей</span>
                </div>
                <?php foreach($employers as $employer): ?>
                <hr id="Line1">
                <div id="employers_index_LayoutGrid3">
                    <div id="LayoutGrid3">
                        <div class="row">
                            <div class="col-1">
                                <div id="employers_index_Image2">
                                    <a href="<?= \yii\helpers\Url::to(['employers/view', 'id' => $employer->id])?>">
                                        <?php

                                        $mainImg = $employer->getImage();
                                        //                                    $sizes = $mainImg->getSizes(); // Array. Original image sizes
                                        //                                    $sizes = $mainImg->getSizesWhen('x60');
                                        //                                    echo '&lt;img width="'.$sizes['width'].'" height="'.$sizes['height'].'" src="'.$mainImg->getUrl('x60').'" />';
                                        //
                                        //
                                        //                                    ?>

                                        <?= Html::img($mainImg->getPathToOrigin(), ['alt' => $employer->name, 'id' => "Image2"])  ?>
                                    </a>
                                </div>
                            </div>
                            <div class="col-2">
                                <div id="employers_index_Text4">
<!--                                    --><?php //Debug($mainImg) ?>
                                    <span id="employers_index_uid4"><?= $employer->name ?> <?= $employer->lastname ?> </span><span id="employers_index_uid5"><strong><a href="<?= \yii\helpers\Url::to(['employers/view', 'id' => $employer->id])?>"><?= $employer->login ?></a><br><span id="employers_index_uid7">Дата регистрации: </span><span id="employers_index_uid8"><strong><?= $employer->date ?></strong></span><span id="employers_index_uid9"><strong><br></strong></span>
                                </div>
                            </div>
                            <div class="col-3">
                                <div id="employers_index_Text5">
                                    <span id="employers_index_uid10"><strong><?= $employer->status ?></strong></span>
                                </div>
                                <div id="employers_index_FontAwesomeIcon2">
                                    <div id="FontAwesomeIcon2"><i class="fa fa-plus">&nbsp;</i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach ?>
            </div>
            <div class="col-2">
                <div id="employers_index_Image3">
                    <img src="images/3a3df9c27b41314cc6e6b8d1e1fd8c29.png" id="Image3" alt="">
                </div>
            </div>
        </div>
    </div>
</div>