<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Quotes */

$this->title = 'Create Quotes';
$this->params['breadcrumbs'][] = ['label' => 'Quotes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="quotes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
