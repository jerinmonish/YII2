<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\UserAlbumSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-album-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'userId') ?>

    <?= $form->field($model, 'abName') ?>

    <?= $form->field($model, 'abDescription') ?>

    <?= $form->field($model, 'abIcon') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'createdOn') ?>

    <?php // echo $form->field($model, 'updatedOn') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
