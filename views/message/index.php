<?php
use yii\helpers\Html;
$this->registerJsFile('/js/message.js',  ['depends' => 'yii\web\JqueryAsset']);
$this->registerCssFile('/css/message.css', ['depends' => ['app\assets\AppAsset']]);//Кидаем ниже файлов в ассете
$this->registerCssFile('/css/spinner.css', ['depends' => ['app\assets\AppAsset']]);//Кидаем ниже файлов в ассете
/**
 * Для смены стилей флешек поработать с кодом ниже
 */
?>
<!--<div class="alert alert-success alert-dismissible" role="alert">-->
<!--    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span-->
<!--                aria-hidden="true">&times;</span></button>-->
<!---->
<!--</div>-->
<div id="mail_content">
    <div id="content">
        <div id="mess">
            <div class="row">
                <div class="col-1">
                    <div id="mail_Text3">
                        <span id="mail_uid3">Личные сообщения: <?=  count($messages);  ?></span>
                    </div>

                    <?php foreach ($messages as $message):?>
                        <hr id="Line1">

                        <div id="mail_message_count">
                            <div id="message_count">
                                <div class="row">
                                    <div class="col-1">
                                        <div id="mail_Image2">
                                            <?php
                                            if(empty($message->employers[0])){
                                                $mainImg = $message->freelancers[0]->getImage();
                                            }
                                            else if(empty($message->freelancers[0])){
                                                $mainImg = $message->employers[0]->getImage();
                                            }
                                            else{
                                                $mainImg = $message->employers[0]->getImage() + $message->freelancers[0]->getImage();
                                            }


                                            //                                    $sizes = $mainImg->getSizes(); // Array. Original image sizes
                                            //                                    $sizes = $mainImg->getSizesWhen('x60');
                                            //                                    echo '&lt;img width="'.$sizes['width'].'" height="'.$sizes['height'].'" src="'.$mainImg->getUrl('x60').'" />';
                                            //                                    ?>
                                            <?= Html::img('/'.$mainImg->getPathToOrigin(), ['alt' => $message->freelancers->name, 'id'=>"Image2"]) ?>

                                        </div>
                                    </div>
                                    <div class="col-2">

                                        <form class="message_delete">
                                            <input type="hidden" id="message_delete_hid" value="<?= $message->id?>">
                                            <input type="button" id="Button_message_delete" data-id="<?= $message->id?>" name="" value="X" onClick="MessageDelete(this);">
                                        </form>
                                        <hr id="message_line">
                                        <div id="mail_message_zag">
                                            <span id="mail_uid4"><strong>Сообщение от пользователя: <?= $message->id?> </strong></span><span id="mail_uid5"><strong><?=  $message->user  ?></strong></span>
                                        </div>
                                        <div id="mail_message_text">
                                    <span id="mail_uid6"><?=  $message->message  ?>

                                        <br>
                                        <br>
                                        <br>
                                        <?php if($message->status == 0): ?>
                                            <?=  "Cообщение не прочитанно"  ?>
                                        <?php else: echo "Cообщение прочитанно"?>
                                        <?php endif; ?>

                                    </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>
                    <hr id="Line2">
                </div>
                <div class="col-2">
                    <div id="mail_CssMenu1">
                        <ul>
                            <li class="firstmain"><a href="#" target="_self">&#1055;&#1088;&#1086;&#1092;&#1080;&#1083;&#1100;</a>
                            </li>
                            <li><a href="#" target="_self">&#1057;&#1086;&#1086;&#1073;&#1097;&#1077;&#1085;&#1080;&#1103;</a>
                            </li>
                            <li><a href="#" target="_self">&#1047;&#1072;&#1082;&#1072;&#1079;&#1099;</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
