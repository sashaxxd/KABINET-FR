<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
?>



<div class="freelancers-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lastname')->textInput(['maxlength' => true]) ?>

    <?php $items = ArrayHelper::map($spec,'id','name');
    $params = [
        'prompt' => 'Выбрать специальность'
    ] ?>


    <?= $form->field($model, 'spec')->dropDownList($items,$params);?>

    <?= $form->field($user, 'username')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'date')->hiddenInput()->label(false) ?>



    <?= $form->field($user, 'id')->hiddenInput()->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Cоздать профиль' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-login' : 'btn btn-login']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>