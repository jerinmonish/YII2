<?php
    use yii\helpers\Html;
    use app\helpers\Common;
    use yii\helpers\Url;
?>
<nav class="main-nav" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button><!--//nav-toggle-->
                </div><!--//navbar-header-->
                <div class="navbar-collapse collapse" id="navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="<?php if(Yii::$app->Common->activeMenu('site/dashboard') == TRUE){?>active<?php }?> nav-item"><a href="<?php echo Yii::$app->urlManager->createUrl('site/dashboard') ?>">Home</a></li>
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false" href="index.html#">Courses <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                              <?php
                                $allCourse = Yii::$app->Common->getCourseAll();
                                //print_r($allCourse);exit;
                                if($allCourse){
                                foreach ($allCourse as $coursesall) {
                              ?>
                                  <li class="dropdown-submenu"><a href="#"><?= $coursesall['title']; ?><i class="fa fa-angle-right"></i></a>
                              <?php
                                $getRelated = Yii::$app->Common->getSubCourseId($coursesall['id']);
                                //print_r($getRelated);
                                ?>
                                        <ul class="dropdown-menu">
                                <?php
                                if($getRelated){
                                foreach($getRelated as $value) {
                                    //print_r(count($value));
                                ?>        
                                    <li><a href="#"><?= $value['title']; ?></a></li>               
                                <?php
                                }
                                }
                                ?>
                                </ul>
                                <?php
                                    }
                                }
                              ?>
                              </li>
                                <!--li class="dropdown-submenu">
                                    <a class="trigger" tabindex="-1" href="#">Courses<i class="fa fa-angle-right"></i></a>
                                    <ul class="dropdown-menu">
                                        <li><a tabindex="-1" href="#">Submenu Level 2</a></li>
                                        <li><a href="#">Submenu Level 2</a></li>
                                        <li><a href="#">Submenu Level 2</a></li-->
                                        <!--li class="dropdown-submenu">
                                            <a class="trigger" href="#">Submenu Level 2 <i class="fa fa-angle-right"></i></a>
                                            <ul class="dropdown-menu">
                                                <li><a href="#">Submenu Level 3</a></li>
                                                <li><a href="#">Submenu Level 3</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li-->
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false" href="index.html#">My Albums <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                              <li><a href="<?php echo Yii::$app->urlManager->createUrl('user-album/my-album') ?>"><i class="fa fa-picture-o" aria-hidden="true"></i>
 Albums</a></li>
                              <li><a href="<?php echo Yii::$app->urlManager->createUrl('album-refrence/') ?>"><i class="fa fa-file-image-o" aria-hidden="true"></i> Images</a></li>
                            </ul>
                        </li>
                        <li class="<?php if(Yii::$app->Common->activeMenu('quiz') == TRUE){?>active<?php }?> nav-item"><a href="<?php echo Yii::$app->urlManager->createUrl('quiz/') ?>">Quiz</a></li>
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false" href="#">News <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="#l">News List</a></li>
                                <li><a href="#">Single News (with image)</a></li>
                                <li><a href="#">Single News (with video)</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a href="events.html">Events</a></li>
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false" href="#">Pages <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">About</a></li>
                                <li><a href="#">Leadership Team</a></li>
                            </ul>
                        </li><!--//dropdown-->
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false" href="index.html#">Shortcodes <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                              <li><a href="#">About</a></li>
                              <li><a href="#">Leadership Team</a></li>
                            </ul>
                        </li><!--//dropdown-->
                        <li class="nav-item"><a href="contact.html">Contact</a></li>
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false" href="#">Profile&nbsp;<i class="fa fa-cog" aria-hidden="true"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo Yii::$app->urlManager->createUrl('change-password/'.Yii::$app->Common->createSecretUrl(Yii::$app->user->identity->id)) ?>"><i class="fa fa-key" aria-hidden="true"></i> Change Password</a></li>
                                <li><a href="<?php echo Yii::$app->urlManager->createUrl('update-profile/'.Yii::$app->Common->createSecretUrl(Yii::$app->user->identity->id)) ?>"><i class="fa fa-wrench" aria-hidden="true"></i> Edit Profile</a></li>
                                <li><a href="<?php echo Yii::$app->urlManager->createUrl('view-profile/'.Yii::$app->Common->createSecretUrl(Yii::$app->user->identity->id)) ?>"><i class="fa fa-eye" aria-hidden="true"></i> View Profile</a></li>
                            </ul>
                        </li>
                    </ul><!--//nav-->
                </div><!--//navabr-collapse-->
            </div><!--//container-->
        </nav>
