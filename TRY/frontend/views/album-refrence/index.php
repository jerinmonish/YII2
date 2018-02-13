<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\AlbumRefrenceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Album Refrences';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="album-refrence-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Album Refrence', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'albumId',
            'pics',
            'photoOrder',
            'albumCount',
            // 'createdOn',
            // 'updatedOn',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
