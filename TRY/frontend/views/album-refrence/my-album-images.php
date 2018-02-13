<?php

use yii\helpers\Html;
use app\helpers\Common;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\UserAlbumSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Album Images';
$this->params['breadcrumbs'][] = $this->title;
//print_r($model);
?>
<div class="content container">
    <div class="page-wrapper">
        <header class="page-heading clearfix">
            <h1 class="heading-title pull-left">Album Lorem Ipsum <small>(without sidebar)</small></h1>
        </header> 
        <div class="page-content">     
            <div class="row page-row">
            <?php 
                if($model){
                    //echo '<pre>';print_r($model);exit;
                    foreach ($model as $key => $value) {
                        //echo '<pre>';print_r($value);
            ?>
                <a class="prettyphoto col-md-3 col-sm-3 col-xs-6" rel="prettyPhoto[gallery]" title="Lorem ipsum dolor sit amet" href="<?php echo Url::base().'/'.\Yii::$app->params['ALBUM_IMAGE_PATH'].$value['pics'];?>">
                    <img class="img-responsive img-thumbnail" src="<?php echo Url::base().'/'.\Yii::$app->params['ALBUM_IMAGE_PATH'].$value['pics'];?>" alt="" />
                </a>
            <?php } } else {?>
                <a class="prettyphoto col-md-3 col-sm-3 col-xs-6" rel="prettyPhoto[gallery]" title="Lorem ipsum dolor sit amet" href="assets/images/gallery/gallery-1.jpg"><img class="img-responsive img-thumbnail" src="assets/images/gallery/gallery-thumb-1.jpg" alt="" /></a>
            <?php } ?>
            </div><!--//page-row-->
        </div><!--//page-content--> 
    </div><!--//page--> 
</div>