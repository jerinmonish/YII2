<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\AlbumRefrence */
/* @var $form yii\widgets\ActiveForm */
$getAlbum = Yii::$app->Common->getAlbumName(Yii::$app->user->identity->id);
?>

<div class="album-refrence-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'albumId')->dropDownList($getAlbum,['prompt'=>'Choose an item'])->label('Album Refrence'); ?>

    <?= $form->field($model, 'pics[]')->fileInput(['multiple' => true])->label('Image'); ?>

    <?= $form->field($model, 'photoOrder')->textInput()->label('Photo Order'); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
