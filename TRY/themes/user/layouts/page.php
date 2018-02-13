<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\widgets\Header;
use frontend\widgets\TopMenu;
use frontend\widgets\Slider;
use frontend\widgets\SliderTwo;
use frontend\widgets\LatestNews;
use frontend\widgets\CourseFinder;
use frontend\widgets\Events;
use frontend\widgets\QuickLinks;
use frontend\widgets\Testimonial;
use frontend\widgets\VideoTour;
use frontend\widgets\Footer;

AppAsset::register($this);
?>
<?php //$this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo Html::encode($this->title); ?>  | <?php echo Yii::$app->params['title']; ?>  </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo $this->theme->baseUrl; ?>/assets/plugins/bootstrap/css/bootstrap.min.css">
    <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/assets/countdown/js/jquery-2.0.3.js"></script>
    <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/assets/countdown/js/jquery.countdownTimer.js"></script>
    <link rel="stylesheet" href="<?php echo $this->theme->baseUrl; ?>/assets/countdown/css/jquery.countdownTimer.css">
    <style type="text/css">
    .footer_bottom
    {
       bottom: 0;
        left: 0;
        padding: 1rem;
        position: absolute;
        right: 0; 
        margin:0;
    }
  </style>
    
</head>
<?php $this->beginBody() ?>
<body style="background-color: pink;">
<div class="jumbotron">
        <!--Answer the questions as soon as possible...-->
        <div id="countdowntimer" class="pull-right"><span id="ms_timer"><span></div>
        <div class="top"></div>
</div>
<div class="container cont">
  <?=$content ?>
</div>
<div class="jumbotron footer_bottom">
  new date
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php //$this->endPage() ?>