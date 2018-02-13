<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ProductSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'prName') ?>

    <?= $form->field($model, 'prImage') ?>

    <?= $form->field($model, 'prPrice') ?>

    <?= $form->field($model, 'prShortDesc') ?>

    <?php // echo $form->field($model, 'prLongDesc') ?>

    <?php // echo $form->field($model, 'prStockStatus') ?>

    <?php // echo $form->field($model, 'prStatus') ?>

    <?php // echo $form->field($model, 'prCreatedOn') ?>

    <?php // echo $form->field($model, 'prUpdatedOn') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
