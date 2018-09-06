<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AdminAsset;

AdminAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="wrapper">
    <div id="admin_header">
        <form name="LayoutGrid1" method="post" action="mailto:yourname@yourdomain.com" enctype="text/plain" id="header">
            <div class="row">
                <div class="col-1">
                    <div id="admin_Image1">
                        <img src="/images/207ba24564eadfa066882e86d5ef8a82.jpg" id="Image1" alt="">
                    </div>
                    <div id="admin_Text1">
                        <span id="admin_uid0">Фрилансер</span>
                    </div>
                </div>
                <div class="col-2">
                    <div id="admin_ResponsiveMenu1">
                        <label class="toggle" for="ResponsiveMenu1-submenu" id="ResponsiveMenu1-title">Меню<span id="ResponsiveMenu1-icon"><span>&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span></span></label>
                        <input type="checkbox" id="ResponsiveMenu1-submenu">
                        <ul class="ResponsiveMenu1" id="ResponsiveMenu1">
                            <li><a href="<?= \yii\helpers\Url::to('/admin/default/index')?>">Главная</a></li>
                            <li><a href="<?= \yii\helpers\Url::to('/admin/freelancers')?>">Фрилансеры</a></li>
<!--                            <li><a href="--><?//= \yii\helpers\Url::to('/cabinet')?><!--">Личный кабинет</a></li>-->

                        </ul>
                    </div>
                </div>
                <div class="col-3">
                    <?php if(Yii::$app->user->isGuest): ?>
                        <a href="<?= \yii\helpers\Url::to()?>" class="auth"><input type="button"  id="Button1" name="" value="ВОЙТИ"> </a>

                        <div id="admin_Text2">
                            <a href="<?= \yii\helpers\Url::to(['auth/signup'])?>"><span id="admin_uid1"><strong>РЕГИСТРАЦИЯ</strong></span></a>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-4">
                    <?php if(!Yii::$app->user->isGuest): ?>
                        <div id="admin_FontAwesomeIcon1">
                            <a href="<?= \yii\helpers\Url::to(['/auth/logout'])?>"><div id="FontAwesomeIcon1"><i class="fa fa-expeditedssl">&nbsp;</i></div></a>
                        </div>

                        <div id="admin_Text7">
                            <a href="<?= \yii\helpers\Url::to(['/auth/logout'])?>"><span id="admin_uid2">&nbsp; Выход</span></a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </form>
    </div>
    <?php if (Yii::$app->session->hasFlash('success')): ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
            <?php echo Yii::$app->session->getFlash('success'); ?>
        </div>
    <?php endif; ?>

    <?php if (Yii::$app->session->hasFlash('error')): ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
            <?php echo Yii::$app->session->getFlash('error'); ?>
        </div>
    <?php endif; ?>
    <div class="content">
        <div class="container" style="padding: 50px 20px 50px 20px;">
        <?= $content ?>
            </div>
    </div>
    <div class="footer">
        <div id="admin_footer">
            <div id="footer">
                <div class="row">
                    <div class="col-1">
                        <div id="admin_Text6">
                            <span id="admin_uid11">Все права защищены © 2017</span>
                        </div>
                    </div>
                    <div class="col-2">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Модальное окно -->

<?php
\yii\bootstrap\Modal::begin([
    'header' => '<div class="cartmod"><h2>Вход</h2></div>',
    'id' => 'auth',
    'size' => 'modal-sm',
    'footer' => ''
]);

\yii\bootstrap\Modal::end();
?>

<!-- /Модальное окно -->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
