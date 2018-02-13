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
    Existing Album Icon
    <img src="<?php echo Yii::$app->Common->setImageUserAlbum($model->abIcon); ?>" alt="<?= $model->abIcon ;?>" width="100" height="100">

    <?= $form->field($model, 'existingAlbumIcon')->textInput(['value' => $model->abIcon])->label(false); ?>

    <?= $form->field($model, 'abIcon')->fileInput() ?>

    <?= $form->field($model, 'status')->dropDownList([ 'Active' => 'Active', 'Inactive' => 'Inactive', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'createdOn')->hiddenInput(['value'=>date('y-m-d h:i:s')])->label(false) ?>

    <?= $form->field($model, 'updatedOn')->hiddenInput(['value'=>date('y-m-d h:i:s')])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(' << Back', ['/user-album/'], ['class' => 'btn btn-default', 'title' => 'Back']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
