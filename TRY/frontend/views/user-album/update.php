<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\UserAlbum */

$this->title = 'Update User Album: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'User Albums', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-album-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formUpdate', [
        'model' => $model,
    ]) ?>

</div>
