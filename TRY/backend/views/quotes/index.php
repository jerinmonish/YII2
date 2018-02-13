<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\helpers\Common;
use backend\models\Quotes;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\QuotesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Quotes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="quotes-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p class="pull-right">
        <?= Html::a('Create Quotes', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',customDate
            'quote',
            //'status',
            [
                'attribute' => 'status',
                'filter' => Html::activeDropDownList($searchModel, 'status', array('Active' => Yii::$app->params['Active'], 'Inactive' => Yii::$app->params['Inactive']), ['class' => 'form-control', 'prompt' => 'Select']),
                'value' => function($model) {
                    return ($model->status == 'Active') ? Yii::$app->params['Active'] : Yii::$app->params['Inactive'];
                },
                'headerOptions' => ['style' => 'width:150px; text-align:center'],
            ],
            [
                'label' => 'Created On',
                'format' => 'html',
                'value' => function($data) {
                    return Yii::$app->Common->customDate($data->createdOn);
                },
                //'attribute' => 'startTimeAt',                
                'headerOptions' => ['style' => 'width:150px;'],
            ],
            //['class' => 'yii\grid\ActionColumn'],
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Action',
                'headerOptions' => ['style' => 'width:100px;'],
                'template' => '{view} {update} {delete}',
                'buttons' =>
                ['view'=>function ($url, $model, $key) {
                        return Html::a('<i class="fa fa-eye" aria-hidden="true"></i>
',
                                        $url,
                                        [
                                    'title' => Yii::t('yii', 'View'),
                                    //'data-method' => 'post',
                        ]);
                    },
                'update'=>function ($url, $model, $key) {
                        return Html::a('<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
',
                                        $url,
                                        [
                                    'title' => Yii::t('yii', 'Edit'),
                                    //'data-method' => 'post',
                        ]);
                    },
                'delete' => function ($url, $model, $key) {
                        return Html::a('<i class="fa fa-trash-o" aria-hidden="true"></i>
',
                                        $url,
                                        [
                                    'title' => Yii::t('yii', 'Delete'),
                                    'data-confirm' => Yii::t('yii',
                                            'Are you sure you want to delete this quote ?'),
                                    //'data-method' => 'post',
                        ]);
                    },
                        ],
                    ],
        ],
    ]); ?>
</div>
