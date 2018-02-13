<?php
    use yii\helpers\Html;
    use yii\helpers\Url;
?>
<div id="mainnav">

                    <!--Shortcut buttons-->
                    <!--================================-->
                    <div id="mainnav-shortcut">

                    </div>
                    <!--================================-->
                    <!--End shortcut buttons-->


                    <!--Menu-->
                    <!--================================-->
                    <div id="mainnav-menu-wrap">
                        <div class="nano">
                            <div class="nano-content">
                                <ul id="mainnav-menu" class="list-group">
						
						            <!--Category name-->
						            <li class="list-header">Navigation</li>
						
						            <!--Menu list item-->
						            <li>
						                <a href="<?php echo Yii::$app->urlManager->createUrl('site/') ?>">
						                    <i class="fa fa-dashboard"></i>
						                    <span class="menu-title">
												<strong>Dashboard</strong>
												<span class="label label-success pull-right">Top</span>
											</span>
						                </a>
						            </li>
						
						            <!--Menu list item-->
						            <li>
						                <a href="#">
						                    <i class="fa fa-th"></i>
						                    <span class="menu-title">
												<strong>Extras</strong>
											</span>
											<i class="arrow"></i>
						                </a>
						
						                <!--Submenu-->
						                <ul class="collapse">
						                    <li><a href="<?php echo Yii::$app->urlManager->createUrl('quotes/') ?>">Quotes</a></li>
											<li><a href="<?php echo Yii::$app->urlManager->createUrl('course/') ?>">Course</a></li>
											<li><a href="<?php echo Yii::$app->urlManager->createUrl('sub-course/') ?>">Sub Course</a></li>
                                            <li><a href="<?php echo Yii::$app->urlManager->createUrl('quiz/') ?>">Quiz</a></li>
                                            <li><a href="<?php echo Yii::$app->urlManager->createUrl('cms/cms/') ?>">Cms</a></li>
                                            <li><a href="<?php echo Yii::$app->urlManager->createUrl('product/') ?>">Products</a></li>
						                </ul>
						            </li>
						
						            <li class="list-divider"></li>
						
						            <!--Category name-->
						            <li class="list-header">Components</li>
						
						            <!--Menu list item-->
						            <li>
						                <a href="#">
						                    <i class="fa fa-briefcase"></i>
						                    <span class="menu-title">UI Elements</span>
											<i class="arrow"></i>
						                </a>
						
						                <!--Submenu-->
						                <ul class="collapse">
						                    <li><a href="#">one</a></li>
											<li><a href="#">Two &amp; Radio</a></li>
						                </ul>
						            </li>
                                </ul>


                                <!--Widget-->
                                <!--================================-->
                                <div class="mainnav-widget">

                                    <!-- Show the button on collapsed navigation -->
                                    <div class="show-small">
                                        <a href="#" data-toggle="menu-widget" data-target="#demo-wg-server">
                                            <i class="fa fa-desktop"></i>
                                        </a>
                                    </div>

                                    <!-- Hide the content on collapsed navigation -->
                                    <div id="demo-wg-server" class="hide-small mainnav-widget-content">
                                        <ul class="list-group">
                                            <li class="list-header pad-no pad-ver">Server Status</li>
                                            <li class="mar-btm">
                                                <span class="label label-primary pull-right">15%</span>
                                                <p>CPU Usage</p>
                                                <div class="progress progress-sm">
                                                    <div class="progress-bar progress-bar-primary" style="width: 15%;">
                                                        <span class="sr-only">15%</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="mar-btm">
                                                <span class="label label-purple pull-right">75%</span>
                                                <p>Bandwidth</p>
                                                <div class="progress progress-sm">
                                                    <div class="progress-bar progress-bar-purple" style="width: 75%;">
                                                        <span class="sr-only">75%</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="pad-ver"><a href="#" class="btn btn-success btn-bock">View Details</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <!--================================-->
                                <!--End widget-->

                            </div>
                        </div>
                    </div>
                    <!--================================-->
                    <!--End menu-->

                </div>