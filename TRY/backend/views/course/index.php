<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CourseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Courses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p class="pull-right">
        <?= Html::a('Create Course', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'label' => 'Course Title',
                'format' => 'html',
                'attribute' => 'title',                
                //'headerOptions' => ['style' => 'width:100px;'],
            ], 
            'courseImage',
            'description:ntext',
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
                                            'Are you sure you want to delete this Course ?'),
                                    //'data-method' => 'post',
                        ]);
                    },
                        ],
                    ],
        ],
    ]); ?>
</div>
