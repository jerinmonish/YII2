<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Quiz */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Quizzes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="quiz-view">

    <h1><?= Html::encode($this->title) ?></h1>

     <table width="100%" class="table table-striped table-bordered detail-view">
            <tr>
                <th width="22%">Course Name</th>
                <td width="78%"><?php echo $model->courseId; ?></td>
            </tr>
            <tr>
                <th width="22%">Sub Course Name</th>
                <td width="78%"><?php echo $model->topicId; ?></td>
            </tr>
            <tr>
                <th width="22%">Question</th>
                <td width="78%"><?php echo $model->question; ?></td>
            </tr>
            <tr>
                <th width="22%">Answer</th>
                <td width="78%"><?php echo $model->answer; ?></td>
            </tr>
            <tr>
                <th width="22%">Option 1</th>
                <td width="78%"><?php echo $model->option1; ?></td>
            </tr>
            <tr>
                <th width="22%">Option 2</th>
                <td width="78%"><?php echo $model->option2; ?></td>
            </tr>
            <tr>
                <th width="22%">Option 3</th>
                <td width="78%"><?php echo $model->option3; ?></td>
            </tr>
            <tr>
                <th width="22%">Option 4</th>
                <td width="78%"><?php echo $model->option4; ?></td>
            </tr>
            <tr>
                <th width="22%">Created On</th>
                <td width="78%"><?php echo $model->createdOn; ?></td>
            </tr>
        </table>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a(' << Back', ['/quiz/'], ['class' => 'btn btn-default', 'title' => 'Back']) ?>
    </p>

</div>
