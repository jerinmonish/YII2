<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\SubCourse */

$this->title = 'Create Sub Course';
$this->params['breadcrumbs'][] = ['label' => 'Sub Courses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sub-course-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
