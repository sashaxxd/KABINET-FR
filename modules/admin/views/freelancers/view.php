<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Freelancers */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Freelancers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="freelancers-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?php $img = $model->getImage();?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            [
                'attribute' => 'image',
                'value' => "<img src='{$img->getUrl('x300')}'>",
                'format' => 'html',
            ],
            'lastname',
            'spec',
            'login',
            'date',
            'status',
        ],
    ]) ?>

</div>