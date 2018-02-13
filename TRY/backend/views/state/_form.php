<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\State */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="state-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'state_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'country_id')->textInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList([ 'Active' => 'Active', 'Suspended' => 'Suspended', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'created_on')->textInput() ?>

    <?= $form->field($model, 'modified_on')->textInput() ?>

    <?= $form->field($model, 'ip')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
