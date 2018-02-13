<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use backend\widgets\Header;
use backend\widgets\Side;
use backend\widgets\FOOTER;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo Html::encode($this->title); ?>  | <?php echo Yii::$app->params['title']; ?>  </title>
    <!--STYLESHEET-->
    <!--=================================================-->
    <!--Bootstrap Stylesheet [ REQUIRED ]-->
    <link href="<?php echo $this->theme->baseUrl; ?>/assets/css/bootstrap.min.css" rel="stylesheet">
    <!--Nifty Stylesheet [ REQUIRED ]-->
    <link href="<?php echo $this->theme->baseUrl; ?>/assets/css/nifty.min.css" rel="stylesheet"> 
    <!--Font Awesome [ OPTIONAL ]-->
    <link href="<?php echo $this->theme->baseUrl; ?>/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!--SCRIPT-->
    <!--JAVASCRIPT-->
    <!--=================================================-->
    <!--jQuery [ REQUIRED ]-->
    <script src="<?php echo $this->theme->baseUrl; ?>/assets/js/jquery-2.1.1.min.js"></script>
    <!--BootstrapJS [ RECOMMENDED ]-->
    <script src="<?php echo $this->theme->baseUrl; ?>/assets/js/bootstrap.min.js"></script>
    <!--Nifty Admin [ RECOMMENDED ]-->
    <script src="<?php echo $this->theme->baseUrl; ?>/assets/js/nifty.min.js"></script>
    
    <!--=================================================-->
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
	<div id="container" class="effect mainnav-lg">
		
        <!--NAVBAR-->
        <!--===================================================-->
        <header id="navbar">
            <?= backend\widgets\Header::widget() ?>
        </header>
        <!--===================================================-->
        <!--END NAVBAR-->

		<div class="boxed">

			<!--CONTENT CONTAINER-->
			<!--===================================================-->
			<div id="content-container">
				
				<!--Page Title-->
				<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
				<div id="page-title">
					<h1 class="page-header text-overflow"><?php echo Html::encode($this->title); ?></h1>

					<!--Searchbox-->
					<div class="searchbox">
						<div class="input-group custom-search-form">
							<input type="text" class="form-control" placeholder="Search..">
							<span class="input-group-btn">
								<button class="text-muted" type="button"><i class="fa fa-search"></i></button>
							</span>
						</div>
					</div>
				</div>
				<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
				<!--End page title-->


				<!--Breadcrumb-->
				<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
				<ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">321</a></li>
                    <li class="active"><?= $this->title ?></li>
                </ol>
				<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
				<!--End breadcrumb-->


		

				<!--Page content-->
				<!--===================================================-->
				<div id="page-content">
					
					<h3 class="text-thin"><!--Your content...--></h3>
					
					<?=$content ?>
					
				</div>
				<!--===================================================-->
				<!--End page content-->


			</div>
			<!--===================================================-->
			<!--END CONTENT CONTAINER-->


			
            <!--MAIN NAVIGATION-->
            <!--===================================================-->
            <nav id="mainnav-container">
                <?= backend\widgets\Side::widget() ?>
            </nav>
            <!--===================================================-->
            <!--END MAIN NAVIGATION-->

		</div>

		

        <!-- FOOTER -->
        <!--===================================================-->
        <footer id="footer">
        <?= backend\widgets\Footer::widget() ?>
        </footer>
        <!--===================================================-->
        <!-- END FOOTER -->


        <!-- SCROLL TOP BUTTON -->
        <!--===================================================-->
        <button id="scroll-top" class="btn"><i class="fa fa-chevron-up"></i></button>
        <!--===================================================-->



	</div>
	<!--===================================================-->
	<!-- END OF CONTAINER -->
</body>
<script type="text/javascript">
    $(document).ready(function(){
        var a = "<?php echo Html::encode($this->title); ?>";
        console.log("this is main.php "+a);
    });
</script>
<?php $this->endBody() ?> 
</html>
<?php $this->endPage() ?>
