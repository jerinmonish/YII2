<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\QuizSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="quiz-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'question') ?>

    <?= $form->field($model, 'answer') ?>

    <?= $form->field($model, 'option1') ?>

    <?= $form->field($model, 'option2') ?>

    <?php // echo $form->field($model, 'option3') ?>

    <?php // echo $form->field($model, 'option4') ?>

    <?php // echo $form->field($model, 'courseId') ?>

    <?php // echo $form->field($model, 'topicId') ?>

    <?php // echo $form->field($model, 'createdOn') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
