<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'prName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'prImage')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'prPrice')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'prShortDesc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'prLongDesc')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'prStockStatus')->dropDownList([ 'Active' => 'Active', 'Inactive' => 'Inactive', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'prStatus')->dropDownList([ 'Active' => 'Active', 'Inactive' => 'Inactive', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'prCreatedOn')->textInput() ?>

    <?= $form->field($model, 'prUpdatedOn')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>