<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\AlbumRefrenceSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="album-refrence-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'albumId') ?>

    <?= $form->field($model, 'pics') ?>

    <?= $form->field($model, 'photoOrder') ?>

    <?= $form->field($model, 'albumCount') ?>

    <?php // echo $form->field($model, 'createdOn') ?>

    <?php // echo $form->field($model, 'updatedOn') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
