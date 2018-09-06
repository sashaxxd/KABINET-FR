<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->registerCssFile('/css/cabinet.css', ['depends' => ['app\assets\AppAsset']]);//Кидаем ниже файлов в ассете
$this->registerCssFile('/css/job_el.css', ['depends' => ['app\assets\AppAsset']]);
$this->registerCssFile('/css/emp_hist.css', ['depends' => ['app\assets\AppAsset']]);
?>

<div id="employer_cabinet_content">
    <div id="content">
        <div class="row">
            <div class="col-1">
                <div id="employer_cabinet_Text3">
                    <span id="employer_cabinet_uid3">Личный кабинет работодателя </span>
                </div>
                <hr id="Line1">
                <div id="employer_cabinet_LayoutGrid3">
                    <div id="LayoutGrid3">
                        <div class="row">
                            <div class="col-1">
                                <div id="employer_cabinet_Image2">

                                    <?php

                                    $mainImg = $employer->getImage();
                                    //                                    $sizes = $mainImg->getSizes(); // Array. Original image sizes
                                    //                                    $sizes = $mainImg->getSizesWhen('x60');
                                    //                                    echo '&lt;img width="'.$sizes['width'].'" height="'.$sizes['height'].'" src="'.$mainImg->getUrl('x60').'" />';
                                    //                                    ?>
                                    <?= Html::img('/'.$mainImg->getPathToOrigin(), ['alt' => $employers->name, 'id'=>"Image2"]) ?>
                                </div>
                            </div>
                            <div class="col-2">
                                <div id="employer_cabinet_Text4">
                                    <span id="employer_cabinet_uid4"><?= $employer->name ?> <?= $employer->lastname ?></span><span id="employer_cabinet_uid5"><strong> <?= $employer->login ?><br></strong></span><span id="employer_cabinet_uid7">Дата регистрации: </span><span id="employer_cabinet_uid8"><strong><?= $employer->date ?></strong></span><span id="employer_cabinet_uid9"><strong><br></strong></span>
                                </div>
                            </div>
                            <div class="col-3">
                                <div id="employer_cabinet_Text5">
                                    <span id="employer_cabinet_uid10"><strong>
                                            <?php
                                            if($employer->status == 0){
                                                echo 'LIGHT';
                                            }
                                            ?>
                                        </strong></span>
                                </div>
                                <div id="employer_cabinet_FontAwesomeIcon2">
                                    <div id="FontAwesomeIcon2"><i class="fa fa-plus">&nbsp;</i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<!--                <hr id="Line2">-->
                <!-- Создать задание -->

                                <div id="el_Text3">
                                    <span id="el_uid0">Создать задание</span>
                                </div>
                                <hr id="Line1">
                                <div id="el_job_container_form">
                                    <div id="job_container_form">
                                        <div class="row">
                                            <?php $form = ActiveForm::begin(['options' => ['data-pjax' => true]])?>
                                            <div class="col-1">


                                                <?= $form->field($job, 'title')->textInput(['id' => 'job_title',
                                                    'placeholder' => 'Введите заголовок задания'])->label(false)?>

                                                <?php

                                                $spec = \app\models\Spec::find()->all();
                                                // формируем массив, с ключем равным полю 'id' и значением равным полю 'name'
                                                $items = \yii\helpers\ArrayHelper::map($spec,'id','name');
                                                $params = [
                                                    'prompt' => 'Выбрать специалиста',
                                                    'id'=>'spec'
                                                ];
                                                ?>

                                                <?= $form->field($job, 'spec')->dropDownList($items, $params)->label(false); ?>

                                                <?= $form->field($job, 'text')->textarea(['id' => 'TextArea1_job',
                                                    'placeholder' => 'Введите описание задания', 'rows' => '11', 'cols' => '92'])->label(false)?>


                                            </div>
                                            <div class="col-2">

                                                <?= $form->field($job, 'currency')->dropDownList([ '0' => 'Руб.', '1' => '$',],
                                                     ['prompt'=> 'Валюта','id'=>'currency'])->label(false); ?>


                                                <?= $form->field($job, 'price')->textInput(['id' => 'budget',
                                                    'placeholder' => 'Бюджет'])->label(false)?>

                                                <?= $form->field($job, 'status')->dropDownList([ '0' => 'ДЛЯ PROFI', '1' => 'ДЛЯ ВСЕХ',],
                                                    ['id'=>'status'])->label(false); ?>

                                                <?= Html::submitButton('Опубликовать', [ 'id' => "Button_job_public", 'class' => 'btn', ]) ?>
                                            </div>
                                            <?php ActiveForm::end()?>
                                        </div>
                                    </div>
                                </div>

                <!-- Конец создать задание -->



            </div>
            <div class="col-2">
                <div id="employer_cabinet_CssMenu1">
                    <ul>
                        <li class="firstmain"><a href="<?= \yii\helpers\Url::to(['employers/profile', 'id' => $employer->id]) ?>" target="_self">Профиль</a>
                        </li>
                        <li><a href="<?= \yii\helpers\Url::to(['/message/'.$employer->id ]) ?> " target="_self" >Сообщения

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
<!-- Все задания работодателя -->
<div id="emp_history_emp_container">
    <div id="emp_container">
        <div class="row">
            <div class="col-1">
                <div id="emp_history_Text3">
                    <span id="emp_history_uid0">Ваши задания</span>
                </div>
                <hr id="Line1">

                <?php foreach ($job_history as $history): ?>
                <div id="emp_history_Container_h3">
                    <div id="Container_h3">
                        <div class="row">
                            <div class="col-1">
                                <div id="emp_history_Text4">
                                    <span id="emp_history_uid1"><?= Html::encode($history->title)  ?></span><span id="emp_history_uid2"><strong><br></strong><?= Html::encode($history->text)  ?></span>
                                </div>
                            </div>
                            <div class="col-2">
                             <a href="<?= \yii\helpers\Url::to(['cabinet/update', 'id' => $history->id]) ?>">
                                 <input type="button"  id="Button_job_public" name="" value="Редактировать">
                             </a>
                                <a href="<?= \yii\helpers\Url::to(['cabinet/delete', 'id' => $history->id]) ?>">
                                    <input type="button" href="<?= \yii\helpers\Url::home() ?>" id="Button1" name="" value="Удалить">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <hr id="Line2">
                <div id="emp_history_Container_h2">
                    <div id="Container_h2">
                        <div class="row">
                            <div class="col-1">
                                <div id="emp_history_FontAwesomeIcon_clock">
                                    <div id="FontAwesomeIcon_clock"><i class="fa fa-clock-o">&nbsp;</i></div>
                                </div>
                                <div id="emp_history_Text8">
                                    <span id="emp_history_uid3"><strong><?= Html::encode($history->time) ?></strong></span>
                                </div>
                            </div>
                            <div class="col-2">
                                <div id="emp_history_FontAwesomeIcon_date">
                                    <div id="FontAwesomeIcon_date"><i class="fa fa-bandcamp">&nbsp;</i></div>
                                </div>
                                <div id="emp_history_Text9">
                                    <span id="emp_history_uid4"><strong><?= Html::encode($history->date) ?></strong></span>
                                </div>
                            </div>
                            <div class="col-3">
                                <div id="emp_history_FontAwesomeIcon_status">
                                    <div id="FontAwesomeIcon_status"><i class="fa fa-user-o">&nbsp;</i></div>
                                </div>
                                <div id="emp_history_Text10">
                                    <span id="emp_history_uid5"><strong>Доступ </strong></span><span id="emp_history_uid6"><strong>ВСЕМ</strong></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>


            </div>
        </div>
    </div>
</div>
<!-- Конец Все задания работодателя -->

<!-- Пагинация-->
<?php
echo \yii\widgets\LinkPager::widget([
        'pagination' => $pages,
    ]
);
?>
<!-- /Пагинация-->