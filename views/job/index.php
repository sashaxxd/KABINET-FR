<?php
/** @var \app\controllers\JobController $jobs */
$this->registerCssFile('/css/job.css', ['depends' => ['app\assets\AppAsset']]);
$this->registerCssFile('/css/filter.css', ['depends' => ['app\assets\AppAsset']]);
use yii\helpers\Html;
use justinvoelker\separatedpager\LinkPager;
use yii\widgets\ActiveForm;

?>

<?//= \app\components\FilterWidget::widget()?>

<div id="filter_filter_container">
    <div id="filter_container">
        <div class="row">
            <div class="col-1">
                <div id="filter_filter_title">
                    <span id="filter_uid0">Фильтры
                        <?php
                        $session = Yii::$app->session;
                        $session->open();
                        ?>

                        <?= $session['checkbox'] ?></span>
                </div>
                <hr id="Line1">
                <hr id="Line2">
                <?php $i = 0;  $form = ActiveForm::begin(['id' => 'form-ajax']); ?>
                <div id="filter_filter_box">
                    <div id="filter_box">
                        <div class="row">
                            <?php foreach ($spec as $item):?>
                                <?php $i++ ?>
                            <?php    $checked = (!empty($session['checkbox'.$i]) ) ? 'checked' : '';
                            ?>
                                <div class="col-1">



                                    <!--                                <div id="filter_Checkbox1">-->
                                    <!--                                    <input type="checkbox" id="Checkbox1" name="Checkbox1" value="on"><label for="Checkbox1"></label>-->
                                    <!--                                </div>-->
                                    <div id="filter_Checkbox1">
                                        <?php  echo $form->field($searchModel, 'spec'.$i,[
                                            'template' => '{input}<label for="Checkbox1"></label>',
                                        ])->checkbox([ 'value' => $item->id,  'id' => 'Checkbox' . $i, 'label' => null, "$checked "  => ''])->label(false) ?>
                                    </div>

                                    <label for="Checkbox<?= $i ?>" style="cursor: pointer;">
                                        <div id="filter_title1">
                                            <span id="filter_uid1"><?= $item->name ?></span>
                                        </div>
                                    </label>


                            </div>
                            <?php endforeach; ?>

                        </div>
                    </div>
                </div>

                <?= Html::submitButton('ОТФИЛЬТРОВАТЬ', [ 'id' => "Button_job_filter", 'class' => 'btn', ]) ?>
                <?= Html::button('ВЫБРАТЬ ВСЕ', [ 'id' => "Button_job_choose", 'class' => 'btn', ]) ?>
                <?= Html::button('ОЧИСТИТЬ ВСЕ', [ 'id' => "Button_job_clear", 'class' => 'btn', ]) ?>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>

<div id="job_content">
    <div id="content">
        <div class="row">
            <div class="col-1">
                <div id="job_Text3">
                    <span id="job_uid0">Проекты</span>
                </div>
                <hr id="Line1">

                <?php  foreach ($dataProvider->getModels() as $job) : ?>

                <div id="job_LayoutGrid3">
                    <div id="LayoutGrid3">
                        <div class="row">
                            <div class="col-1">
                                <div id="job_Text4">
                                    <span id="job_uid1"><a href="<?= \yii\helpers\Url::to(['job/view', 'id' => $job->id])?>"><?= Html::encode($job->title) ?></a></span><span id="job_uid2"><strong><br></strong><?= Html::encode(mb_substr($job->text, 0, 300)) ?> ...</span>
                                </div>
                            </div>
                            <div class="col-2">
                                <div id="job_Text5">
                                    <span id="job_uid3"><strong><?= $job->price ?>  <?php
                                            if($job->currency == 1){
                                                echo '$';
                                            }
                                            else{
                                                echo 'руб.';
                                            }
                                            ?></strong></span>
                                </div>
                                <hr id="Line4">
                                <div id="job_Image2">
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
                <hr id="Line2">
                <div id="job_LayoutGrid2">
                    <div id="LayoutGrid2">
                        <div class="row">
                            <div class="col-1">
                                <div id="job_FontAwesomeIcon2">
                                    <div id="FontAwesomeIcon2"><i class="fa fa-clock-o">&nbsp;</i></div>
                                </div>
                                <div id="job_Text8">
                                    <span id="job_uid4"><strong><?= $job->time ?></strong></span>
                                </div>
                            </div>
                            <div class="col-2">
                                <div id="job_FontAwesomeIcon3">
                                    <div id="FontAwesomeIcon3"><i class="fa fa-bandcamp">&nbsp;</i></div>
                                </div>
                                <div id="job_Text9">
                                    <span id="job_uid5"><strong><?= $job->date ?></strong></span>
                                </div>
                            </div>
                            <div class="col-3">
                                <div id="job_FontAwesomeIcon4">
                                    <div id="FontAwesomeIcon4"><i class="fa fa-user-o">&nbsp;</i></div>
                                </div>
                                <div id="job_Text10">
                                    <span id="job_uid6"><strong>Доступ </strong></span><span id="job_uid7"><strong>
                                            <?php
                                            if($job->status == 1){
                                                echo 'ДЛЯ ВСЕХ';
                                            }
                                            else{
                                                echo 'ДЛЯ PROFI';
                                            }
                                            ?>
                                        </strong></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php  endforeach; ?>
            </div>
            <div class="col-2">
                <div id="job_Image3">
                    <img src="/images/3a3df9c27b41314cc6e6b8d1e1fd8c29.png" id="Image3" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Пагинация-->
<?php

echo LinkPager::widget([
    'pagination'=>$dataProvider->pagination,

        'class' => 'justinvoelker\separatedpager\CustomLinkPager',
        'maxButtonCount' => 5,
//        'prevPageLabel' => 'наза',
//        'nextPageLabel' => 'Next',
        'prevPageCssClass' => 'prev hidden-xs',
        'nextPageCssClass' => 'next hidden-xs',
        'activePageAsLink' => false,


//        'maxButtonCount' => 3,

]);
?>
<!-- /Пагинация-->