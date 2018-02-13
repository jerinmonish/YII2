<?php

use yii\helpers\Html;
use app\helpers\Common;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\UserAlbumSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Albums';
$this->params['breadcrumbs'][] = $this->title;
//print_r($model);
?>
<div class="content container">
            <div class="page-wrapper">
                <header class="page-heading clearfix">
                    <h1 class="heading-title pull-left">Gallery </h1>
                    <span class="pull-right"><a href="<?php echo Yii::$app->urlManager->createUrl('user-album/') ?>">Edit/Delete Album</a></span>
                </header> 
                <div class="page-content">    
                    <div class="page-row">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla iaculis, nisl eget venenatis ultricies, eros augue semper turpis, vitae euismod leo urna vitae nulla. Mauris sem urna, aliquet quis sodales et, convallis vel ante. Sed convallis id sem sed feugiat. Aenean eget tempus tortor.</p>    
                        <!-- <p class="page-row text-muted">Image credit: <a href="#" target="_blank">Francisco Osorio</a>, <a href="#">Creative Commons 2.0 license</a></p> -->
                    </div>

                    <div class="row page-row">
                    <?php 
                        if($model){
                            foreach ($model as $key => $value) {
                    ?>
                        <div class="col-md-4 col-sm-4 col-xs-12 text-center">
                            <div class="album-cover">
                                <a href="<?php echo Yii::$app->urlManager->createUrl('album-images/'.Yii::$app->Common->createSecretUrl($value['id'])); ?>"><img class="img-responsive" src="<?php echo Url::base().'/'.\Yii::$app->params['ALBUM_ICON_PATH'].$value['abIcon'];?>" alt="" height="200"/></a>
                                <div class="desc">
                                    <h4><small><a href="#"><?php echo $value['abName']; ?></a></small></h4>
                                    <p><?php echo $value['abDescription']; ?></p>
                                </div>
                            </div>
                        </div>
                        <?php 
                            }
                        } else {

                        ?>
                        <div class="col-md-4 col-sm-4 col-xs-12 text-center">
                            <div class="album-cover">
                                <a href="#"><img class="img-responsive" src="<?php echo Url::base().'/'.\Yii::$app->params['ALBUM_ICON_PATH'].'no-img.png';?>" alt="" /></a>
                                <div class="desc">
                                    <h4><small><a href="<?php echo Yii::$app->urlManager->createUrl(['user-album/create']); ?>">Create Album</a></small></h4>
                                    <p>Create a n Album so that u can maintain your Images</p>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div><!--//page-row-->
                    
                </div><!--//page-content-->
            </div><!--//page--> 
        </div>
