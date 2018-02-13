<?php
    use yii\helpers\Html;
    use yii\helpers\Url;
?>
<header class="header">  
            <div class="top-bar">
                <div class="container">             
                    <ul class="social-icons col-md-6 col-sm-6 col-xs-12 hidden-xs">
                        <li><a href="index.html#" ><i class="fa fa-twitter"></i></a></li>
                        <li><a href="index.html#" ><i class="fa fa-facebook"></i></a></li>
                        <li><a href="index.html#" ><i class="fa fa-youtube"></i></a></li>
                        <li><a href="index.html#" ><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="index.html#" ><i class="fa fa-google-plus"></i></a></li>         
                        <li class="row-end"><a href="index.html#" ><i class="fa fa-rss"></i></a></li>             
                    </ul><!--//social-icons-->
                    <form class="pull-right search-form" role="search">
                        <div class="form-group">
                            <img src="<?php echo Yii::$app->Common->setImage(Yii::$app->user->identity->userImage); ?>" class="img-rounded" width="30" height="30">
                            <span class="badge">Logged in as <?=Yii::$app->user->identity->username?></span>
                            <a href="<?php echo Yii::$app->urlManager->createUrl(['site/logout']); ?>" title="Logout"><i class="fa fa-sign-out fa-2x" aria-hidden="true"></i></a>
                        </div>
                        
                        <!--button type="submit" class="btn btn-theme">Go</button-->
                        
                    </form>         
                </div>      
            </div><!--//to-bar-->
            <div class="header-main container">
                <h1 class="logo col-md-4 col-sm-4">
                    <a href="<?php echo Yii::$app->urlManager->createUrl('site/dashboard') ?>"><img id="logo" src="<?php echo $this->theme->baseUrl; ?>/assets/images/logo.png" alt="Logo"></a>
                </h1><!--//logo-->           
                <div class="info col-md-8 col-sm-8">
                    <ul class="menu-top navbar-right hidden-xs">
                        <li class="divider"><a href="index.html">Home</a></li>
                        <li class="divider"><a href="faq.html">FAQ</a></li>
                        <li><a href="contact.html">Contact</a></li>
                    </ul><!--//menu-top-->
                    <br />
                    <div class="contact pull-right">
                        <p class="phone"><i class="fa fa-phone"></i>Call us today 0800 123 4567</p> 
                        <p class="email"><i class="fa fa-envelope"></i><a href="index.html#">enquires@website.com</a></p>
                    </div><!--//contact-->
                </div><!--//info-->
            </div><!--//header-main-->
        </header>