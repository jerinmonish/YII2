<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Quotes */

$this->title = 'View Course';//$model->id;
/*$this->params['breadcrumbs'][] = ['label' => 'Quotes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;*/
Yii::setAlias('@bsource', 'http://localhost/Jerin/yii/TRY/uploads/course/');
//echo Url::to('@bsource');
?>
<div class="quotes-view">
    <table width="100%" class="table table-striped table-bordered detail-view">
            <tr>
                <th width="22%">Course Name</th>
                <td width="78%"><?php echo $model->title; ?></td>
            </tr>
            <tr>
                <th width="22%">Course Image</th>
                <td width="78%">
                    <img src="<?php echo Url::to('@bsource').'/'.$model->courseImage; ?>" alt="<?php echo $model->courseImage; ?>" height="100" width="100">
                    <!-- <img src="smiley.gif" alt="Smiley face" height="42" width="42"> -->
                </td>
            </tr>
            <tr>
                <th width="22%">Course Desctiption</th>
                <td width="78%"><?php echo $model->description; ?></td>
            </tr>
            <tr>
                <th width="22%">Created On</th>
                <td width="78%"><?php echo Yii::$app->Common->mysqlDate($model->createdOn); ?></td>
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
        <?= Html::a(' << Back', ['/course/'], ['class' => 'btn btn-default', 'title' => 'Back']) ?>
    </p>
</div>

