<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Quotes */

$this->title = 'View Quote';//$model->id;
/*$this->params['breadcrumbs'][] = ['label' => 'Quotes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;*/
?>
<div class="quotes-view">
    <table width="100%" class="table table-striped table-bordered detail-view">
            <tr>
                <th width="22%">Quote</th>
                <td width="78%"><?php echo $model->quote; ?></td>
            </tr>
            <tr>
                <th width="22%">Status</th>
                <td width="78%"><?php echo $model->status; ?></td>
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
        <?= Html::a(' << Back', ['/quotes/'], ['class' => 'btn btn-default', 'title' => 'Back']) ?>
    </p>
</div>
