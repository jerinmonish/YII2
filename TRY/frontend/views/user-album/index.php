<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\UserAlbumSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Albums';
$this->params['breadcrumbs'][] = $this->title;
Yii::$app->assetManager->bundles['yii\web\JqueryAsset'] = false; // To disable the yii jquery.js file
?>
<div class="user-album-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create User Album', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'userId',
            'abName',
            'abDescription',
            'abIcon',
            // 'status',
            // 'createdOn',
            // 'updatedOn',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
