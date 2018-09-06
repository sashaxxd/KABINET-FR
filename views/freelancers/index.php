<?php
use yii\helpers\Html;
$this->registerCssFile('/css/freelancers_index.css', ['depends' => ['app\assets\AppAsset']]);//Кидаем ниже файлов в ассете
?>
<div id="freelancers_index_content">
    <div id="content">
        <div class="row">
            <div class="col-1">
                <div id="freelancers_index_Text3">
                    <span id="freelancers_index_uid3">Каталог фрилансеров</span>
                </div>
                <?php foreach($freelancers as $freelancer): ?>
                <hr id="Line1">
                <div id="freelancers_index_LayoutGrid3">
                    <div id="LayoutGrid3">
                        <div class="row">
                            <div class="col-1">
                                <div id="freelancers_index_Image2">
                                    <a href="<?= \yii\helpers\Url::to(['freelancers/view', 'id' => $freelancer->id])?>">
                                        <?php

                                        $mainImg = $freelancer->getImage();
                                        //                                    $sizes = $mainImg->getSizes(); // Array. Original image sizes
                                        //                                    $sizes = $mainImg->getSizesWhen('x60');
                                        //                                    echo '&lt;img width="'.$sizes['width'].'" height="'.$sizes['height'].'" src="'.$mainImg->getUrl('x60').'" />';
                                        //
                                        //
                                        //                                    ?>

                                        <?= Html::img('/' . $mainImg->getPathToOrigin(), ['alt' => $freelancer->name, 'id' => "Image2"])  ?>
                                    </a>
                                </div>
                            </div>
                            <div class="col-2">
                                <div id="freelancers_index_Text4">
<!--                                    --><?php //Debug($mainImg) ?>
                                    <span id="freelancers_index_uid4"><?= $freelancer->name ?> <?= $freelancer->lastname ?> </span>
                                    <span id="freelancers_index_uid5"><strong><a href="<?= \yii\helpers\Url::to(['freelancers/view', 'id' => $freelancer->id])?>"><?= $freelancer->login ?></a><br>Специализация: </strong>
                                    </span><span id="freelancers_index_uid6"><strong><?= $freelancer->special->name ?><br></strong></span>
                                    <span id="freelancers_index_uid7">Дата регистрации: </span>
                                    <span id="freelancers_index_uid8"><strong><?= $freelancer->date ?></strong></span>
                                    <br>
                                    <span id="freelancers_index_uid9">На сайте:
                                        <?php
                                        $datetime1 = date_create($freelancer->date);
                                        $datetime_z = date('Y-m-d');
                                        $datetime2 = date_create($datetime_z);
//                                        $datetime2 = date('Y-m-d');
                                
                                        $interval = date_diff($datetime1, $datetime2);
                                        if($interval->format('%y') == 0 || $interval->format('%y') == 5
                                        || $interval->format('%y') == 6){
                                            echo $interval->format('%y') . ' Лет ';
                                        }
                                        else{
                                            echo $interval->format('%y') . ' Года ';
                                        }
                                        

                                        echo $interval->format('%m') . ' Месяцы ' ;
                                        echo $interval->format('%d') . ' Дни ';
                                        ?>


                                      <strong><br></strong></span>
                                </div>
                            </div>
                            <div class="col-3">
                                <div id="freelancers_index_Text5">
                                    <span id="freelancers_index_uid10"><strong><?= $freelancer->status ?></strong></span>
                                </div>
                                <div id="freelancers_index_FontAwesomeIcon2">
                                    <div id="FontAwesomeIcon2"><i class="fa fa-plus">&nbsp;</i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach ?>
            </div>
            <div class="col-2">
                <div id="freelancers_index_Image3">
<!--                    реклама -->
                    <img src="/images/3a3df9c27b41314cc6e6b8d1e1fd8c29.png" id="Image3" alt="">
                </div>
            </div>



        </div>
    </div>
</div>

<div id="app_free_index" style="width: 100%; height: 0px; float: left;"></div>
<!-- Пагинация-->
<?php
echo \yii\widgets\LinkPager::widget([
        'pagination' => $pages,
    ]
);
?>
<!-- /Пагинация-->