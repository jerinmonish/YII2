<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\QuizSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Quizzes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="quiz-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p class="pull-right">
        <?= Html::a('Create Quotes', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pager' => [
	        'firstPageLabel' => 'First',
	        'lastPageLabel' => 'Last',
    	],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'question',
            ////'answer',
            //'option1',
            //'option2',
            // 'option3',
            // 'option4',
            // 'courseId',
            // 'topicId',
            // 'createdOn',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
