<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use backend\widgets\Header;
use backend\widgets\Side;
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
			
			<!--ASIDE-->
			<!--===================================================-->
			<aside id="aside-container">
				<div id="aside">
					<div class="nano">
						<div class="nano-content">
							
							<!--Nav tabs-->
							<!--================================-->
							<ul class="nav nav-tabs nav-justified">
								<li class="active">
									<a href="#demo-asd-tab-1" data-toggle="tab">
										<i class="fa fa-comments"></i>
										<span class="badge badge-purple">7</span>
									</a>
								</li>
								<li>
									<a href="#demo-asd-tab-2" data-toggle="tab">
										<i class="fa fa-info-circle"></i>
									</a>
								</li>
								<li>
									<a href="#demo-asd-tab-3" data-toggle="tab">
										<i class="fa fa-wrench"></i>
									</a>
								</li>
							</ul>
							<!--================================-->
							<!--End nav tabs-->



							<!-- Tabs Content -->
							<!--================================-->
							<div class="tab-content">

								<!--First tab (Contact list)-->
								<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
								<div class="tab-pane fade in active" id="demo-asd-tab-1">
									<h4 class="pad-hor text-thin">
										<span class="pull-right badge badge-warning">3</span> Family
									</h4>

									<!--Family-->
									<div class="list-group bg-trans">
										<a href="#" class="list-group-item">
											<div class="media-left">
												<img class="img-circle img-xs" src="<?php echo $this->theme->baseUrl; ?>/assets/img/av2.png" alt="Profile Picture">
											</div>
											<div class="media-body">
												<div class="text-lg">Stephen Tran</div>
												<span class="text-muted">Availabe</span>
											</div>
										</a>
										<a href="#" class="list-group-item">
											<div class="media-left">
												<img class="img-circle img-xs" src="<?php echo $this->theme->baseUrl; ?>/assets/img/av4.png" alt="Profile Picture">
											</div>
											<div class="media-body">
												<div class="text-lg">Brittany Meyer</div>
												<span class="text-muted">I think so</span>
											</div>
										</a>
										<a href="#" class="list-group-item">
											<div class="media-left">
												<img class="img-circle img-xs" src="<?php echo $this->theme->baseUrl; ?>/assets/img/av3.png" alt="Profile Picture">
											</div>
											<div class="media-body">
												<div class="text-lg">Donald Brown</div>
												<span class="text-muted">Lorem ipsum dolor sit amet.</span>
											</div>
										</a>
									</div>


									<hr>
									<h4 class="pad-hor text-thin">
										<span class="pull-right badge badge-info">4</span> Friends
									</h4>

									<!--Friends-->
									<div class="list-group bg-trans">
										<a href="#" class="list-group-item">
											<div class="media-left">
												<img class="img-circle img-xs" src="<?php echo $this->theme->baseUrl; ?>/assets/img/av5.png" alt="Profile Picture">
											</div>
											<div class="media-body">
												<div class="text-lg">Betty Murphy</div>
												<span class="text-muted">Bye</span>
											</div>
										</a>
										<a href="#" class="list-group-item">
											<div class="media-left">
												<img class="img-circle img-xs" src="<?php echo $this->theme->baseUrl; ?>/assets/img/av6.png" alt="Profile Picture">
											</div>
											<div class="media-body">
												<div class="text-lg">Olivia Spencer</div>
												<span class="text-muted">Thank you!</span>
											</div>
										</a>
										<a href="#" class="list-group-item">
											<div class="media-left">
												<img class="img-circle img-xs" src="<?php echo $this->theme->baseUrl; ?>/assets/img/av4.png" alt="Profile Picture">
											</div>
											<div class="media-body">
												<div class="text-lg">Sarah Ruiz</div>
												<span class="text-muted">2 hours ago</span>
											</div>
										</a>
										<a href="#" class="list-group-item">
											<div class="media-left">
												<img class="img-circle img-xs" src="<?php echo $this->theme->baseUrl; ?>/assets/img/av3.png" alt="Profile Picture">
											</div>
											<div class="media-body">
												<div class="text-lg">Paul Aguilar</div>
												<span class="text-muted">2 hours ago</span>
											</div>
										</a>
									</div>


									<hr>
									<h4 class="pad-hor text-thin">
										<span class="pull-right badge badge-success">Offline</span> Works
									</h4>

									<!--Works-->
									<div class="list-group bg-trans">
										<a href="#" class="list-group-item">
											<span class="badge badge-purple badge-icon badge-fw pull-left"></span> Joey K. Greyson
										</a>
										<a href="#" class="list-group-item">
											<span class="badge badge-info badge-icon badge-fw pull-left"></span> Andrea Branden
										</a>
										<a href="#" class="list-group-item">
											<span class="badge badge-pink badge-icon badge-fw pull-left"></span> Lucy Moon
										</a>
										<a href="#" class="list-group-item">
											<span class="badge badge-success badge-icon badge-fw pull-left"></span> Johny Juan
										</a>
										<a href="#" class="list-group-item">
											<span class="badge badge-danger badge-icon badge-fw pull-left"></span> Susan Sun
										</a>
									</div>

								</div>
								<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
								<!--End first tab (Contact list)-->


								<!--Second tab (Custom layout)-->
								<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
								<div class="tab-pane fade" id="demo-asd-tab-2">

									<!--Monthly billing-->
									<div class="pad-all">
										<h4 class="text-lg mar-no">Monthly Billing</h4>
										<p class="text-sm">January 2015</p>
										<button class="btn btn-block btn-success mar-top">Pay Now</button>
									</div>


									<hr>

									<!--Information-->
									<div class="text-center clearfix pad-top">
										<div class="col-xs-6">
											<span class="h4">4,327</span>
											<p class="text-muted text-uppercase"><small>Sales</small></p>
										</div>
										<div class="col-xs-6">
											<span class="h4">$ 1,252</span>
											<p class="text-muted text-uppercase"><small>Earning</small></p>
										</div>
									</div>


									<hr>

									<!--Simple Menu-->
									<div class="list-group bg-trans">
										<a href="#" class="list-group-item"><span class="label label-danger pull-right">Featured</span>Edit Password</a>
										<a href="#" class="list-group-item">Email</a>
										<a href="#" class="list-group-item"><span class="label label-success pull-right">New</span>Chat</a>
										<a href="#" class="list-group-item">Reports</a>
										<a href="#" class="list-group-item">Transfer Funds</a>
									</div>


									<hr>

									<div class="text-center">Questions?
										<p class="text-lg text-semibold"> (415) 234-53454 </p>
										<small><em>We are here 24/7</em></small>
									</div>
								</div>
								<!--End second tab (Custom layout)-->
								<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->


								<!--Third tab (Settings)-->
								<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
								<div class="tab-pane fade" id="demo-asd-tab-3">
									<ul class="list-group bg-trans">
										<li class="list-header">
											<h4 class="text-thin">Account Settings</h4>
										</li>
										<li class="list-group-item">
											<div class="pull-right">
												<input class="demo-switch" type="checkbox" checked>
											</div>
											<p>Show my personal status</p>
											<small class="text-muted">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</small>
										</li>
										<li class="list-group-item">
											<div class="pull-right">
												<input class="demo-switch" type="checkbox" checked>
											</div>
											<p>Show offline contact</p>
											<small class="text-muted">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</small>
										</li>
										<li class="list-group-item">
											<div class="pull-right">
												<input class="demo-switch" type="checkbox">
											</div>
											<p>Invisible mode </p>
											<small class="text-muted">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</small>
										</li>
									</ul>


									<hr>

									<ul class="list-group bg-trans">
										<li class="list-header"><h4 class="text-thin">Public Settings</h4></li>
										<li class="list-group-item">
											<div class="pull-right">
												<input class="demo-switch" type="checkbox" checked>
											</div>
											Online status
										</li>
										<li class="list-group-item">
											<div class="pull-right">
												<input class="demo-switch" type="checkbox" checked>
											</div>
											Show offline contact
										</li>
										<li class="list-group-item">
											<div class="pull-right">
												<input class="demo-switch" type="checkbox">
											</div>
											Show my device icon
										</li>
									</ul>



									<hr>

									<h4 class="pad-hor text-thin">Task Progress</h4>
									<div class="pad-all">
										<p>Upgrade Progress</p>
										<div class="progress progress-sm">
											<div class="progress-bar progress-bar-success" style="width: 15%;"><span class="sr-only">15%</span></div>
										</div>
										<small class="text-muted">15% Completed</small>
									</div>
									<div class="pad-hor">
										<p>Database</p>
										<div class="progress progress-sm">
											<div class="progress-bar progress-bar-danger" style="width: 75%;"><span class="sr-only">75%</span></div>
										</div>
										<small class="text-muted">17/23 Database</small>
									</div>

								</div>
								<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
								<!--Third tab (Settings)-->

							</div>
						</div>
					</div>
				</div>
			</aside>
			<!--===================================================-->
			<!--END ASIDE-->

		</div>

		

        <!-- FOOTER -->
        <!--===================================================-->
        <footer id="footer">

            <!-- Visible when footer positions are fixed -->
            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
            <div class="show-fixed pull-right">
                <ul class="footer-list list-inline">
                    <li>
                        <p class="text-sm">SEO Proggres</p>
                        <div class="progress progress-sm progress-light-base">
                            <div style="width: 80%" class="progress-bar progress-bar-danger"></div>
                        </div>
                    </li>

                    <li>
                        <p class="text-sm">Online Tutorial</p>
                        <div class="progress progress-sm progress-light-base">
                            <div style="width: 80%" class="progress-bar progress-bar-primary"></div>
                        </div>
                    </li>
                    <li>
                        <button class="btn btn-sm btn-dark btn-active-success">Checkout</button>
                    </li>
                </ul>
            </div>



            <!-- Visible when footer positions are static -->
            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
            <div class="hide-fixed pull-right pad-rgt">Currently v2.3</div>



            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
            <!-- Remove the class name "show-fixed" and "hide-fixed" to make the content always appears. -->
            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

            <p class="pad-lft">&#0169; 2015 Your Company</p>



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
<?php $this->endBody() ?> 
</html>
<?php $this->endPage() ?>
