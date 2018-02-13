<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\UserAlbum */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-album-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'userId')->hiddenInput(['value' => Yii::$app->user->identity->id])->label(false) ?>

    <?= $form->field($model, 'abName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'abDescription')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'abIcon')->fileInput() ?>

    <?= $form->field($model, 'status')->dropDownList([ 'Active' => 'Active', 'Inactive' => 'Inactive', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
