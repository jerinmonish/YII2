<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Quotes */

$this->title = 'View Sub Course';//$model->id;
/*$this->params['breadcrumbs'][] = ['label' => 'Quotes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;*/
?>
<div class="quotes-view">
    <table width="100%" class="table table-striped table-bordered detail-view">
            <tr>
                <th width="22%">Course Name</th>
                <td width="78%"><?php echo $model->course_id; ?></td>
            </tr>
            <tr>
                <th width="22%">Topic Title</th>
                <td width="78%"><?php echo $model->title; ?></td>
            </tr>
            <tr>
                <th width="22%">Course Desctiption</th>
                <td width="78%"><?php echo $model->description; ?></td>
            </tr>
            <tr>
                <th width="22%">Topic Image</th>
                <td width="78%"><?php echo $model->image; ?></td>
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
        <?= Html::a(' << Back', ['/sub-course/'], ['class' => 'btn btn-default', 'title' => 'Back']) ?>
    </p>
</div>


