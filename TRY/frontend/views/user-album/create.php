<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\UserAlbum */

$this->title = 'Create User Album';
$this->params['breadcrumbs'][] = ['label' => 'User Albums', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-album-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
