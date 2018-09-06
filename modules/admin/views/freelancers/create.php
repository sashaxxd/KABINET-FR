<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Freelancers */

$this->title = 'Create Freelancers';
$this->params['breadcrumbs'][] = ['label' => 'Freelancers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="freelancers-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
