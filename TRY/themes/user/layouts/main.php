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
<?php $this->beginPage() ?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->  
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
<!--[if !IE]><!--> <html lang="<?= Yii::$app->language ?>"> <!--<![endif]-->  
<head>
    <title><?php echo Html::encode($this->title); ?>  | <?php echo Yii::$app->params['title']; ?>  </title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">    
    <link rel="shortcut icon" href="favicon.ico">  
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>   
    <!-- Global CSS -->
    <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/assets/plugins/jquery-1.12.3.min.js"></script>
    <link rel="stylesheet" href="<?php echo $this->theme->baseUrl; ?>/assets/plugins/bootstrap/css/bootstrap.min.css">   
    <!-- Plugins CSS -->    
    <link rel="stylesheet" href="<?php echo $this->theme->baseUrl; ?>/assets/plugins/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="<?php echo $this->theme->baseUrl; ?>/assets/plugins/flexslider/flexslider.css">
    <link rel="stylesheet" href="<?php echo $this->theme->baseUrl; ?>/assets/plugins/pretty-photo/css/prettyPhoto.css"> 
    <link rel="stylesheet" href="<?php echo $this->theme->baseUrl; ?>/assets/plugins/bootstrap/css/bootstrap-datepicker.css">
    <!-- Theme CSS -->  
    <link id="theme-style" rel="stylesheet" href="<?php echo $this->theme->baseUrl; ?>/assets/css/styles.css">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php $this->head() ?>
</head> 
<?php $this->beginBody() ?>
<body class="home-page">
    <div class="wrapper">
        <!-- ******HEADER****** --> 
            <?= frontend\widgets\Header::widget() ?>
        <!-- ******HEADER****** --> 

        <!-- ******NAV****** -->
            <?= frontend\widgets\TopMenu::widget() ?>
        <!--//main-nav-->
        
        <!-- ******CONTENT****** --> 
        <div class="content container">
            
            <div style="padding-bottom: 20px;text-align: justify;">
                <?= $content ?>
            </div>
        </div><!--//content-->
    </div><!--//wrapper-->
    
    <!-- ******FOOTER****** --> 
    <?= frontend\widgets\Footer::widget() ?>
    <!--//footer-->
    
    
 
    <!-- Javascript -->          
    
    <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/assets/plugins/bootstrap/js/bootstrap.min.js"></script> 
    <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/assets/plugins/bootstrap-hover-dropdown.min.js"></script> 
    <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/assets/plugins/back-to-top.js"></script>
    <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/assets/plugins/jquery-placeholder/jquery.placeholder.js"></script>
    <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/assets/plugins/pretty-photo/js/jquery.prettyPhoto.js"></script>
    <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/assets/plugins/flexslider/jquery.flexslider-min.js"></script>
    <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/assets/plugins/jflickrfeed/jflickrfeed.min.js"></script> 
    <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/assets/plugins/bootstrap/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/assets/js/main.js"></script>             
<?php $this->endBody() ?> 
</body>
</html> 
<?php //$this->endPage() ?>
