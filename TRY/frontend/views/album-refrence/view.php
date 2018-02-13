<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Quotes */

$this->title = 'View Album image';//$model->id;
/*$this->params['breadcrumbs'][] = ['label' => 'Quotes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;*/
$ab_name = Yii::$app->Common->getSingleAlbumName($model->albumId);
?>
<div class="quotes-view">
    <table width="100%" class="table table-striped table-bordered detail-view">
            <tr>
                <th width="22%">Album Name</th>
                <td width="78%"><?php echo $ab_name['abName']; ?></td>
            </tr>
            <tr>
                <th width="22%">Album Images</th>
                <td width="78%">
                    <?php
                        $exp = explode(',', $model->pics);
                        //print_r($exp);
                        foreach ($exp as $key => $value) {
                    ?>
                        <a href="<?php echo Yii::$app->homeUrl.'uploads/user_album_img/'.$value; ?>" target="_blank">
                            <img src="<?php echo Yii::$app->homeUrl.'uploads/user_album_img/'.$value; ?>" alt="Smiley face" height="42" width="42">-
                        </a>
                    <?php
                            //echo '<pre>';print_r($value);
                        }
                    ?>
                    
                </td>
            </tr>
            <tr>
                <th width="22%">Photo Order</th>
                <td width="78%"><?php echo $model->photoOrder; ?></td>
            </tr>
            <tr>
                <th width="22%">Seen many</th>
                <td width="78%"><?php echo ($model->albumCount) ? $model->albumCount : 'Not yet viewed'; ?></td>
            </tr>
            <tr>
                <th width="22%">Created On</th>
                <td width="78%"><?php echo Yii::$app->Common->mysqlDate($model->createdOn); ?></td>
            </tr>
            <tr>
                <th width="22%">Updated On</th>
                <td width="78%"><?php echo Yii::$app->Common->mysqlDate($model->updatedOn); ?></td>
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
        <?= Html::a(' << Back', ['/album-refrence/'], ['class' => 'btn btn-default', 'title' => 'Back']) ?>
    </p>
</div>

