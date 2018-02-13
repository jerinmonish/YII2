<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\AlbumRefrence */

$this->title = 'Create Album Refrence';
$this->params['breadcrumbs'][] = ['label' => 'Album Refrences', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="album-refrence-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
