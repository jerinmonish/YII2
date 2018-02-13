<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use app\helpers\Common;
use yii\helpers\Url;

$this->title = 'Courses';
$this->params['breadcrumbs'][] = $this->title;
Yii::setAlias('@bsource', 'http://localhost/Jerin/yii/TRY/uploads/course/');
Yii::setAlias('@bsourc', 'http://localhost/Jerin/yii/TRY/uploads/sub_course/');
?>
<link rel="stylesheet" href="<?php echo $this->theme->baseUrl; ?>/assets/css/course_css.css">



<div class="col-md-12">
<?php
	if(!empty($course)){
		foreach ($course as $allCourses) {
			//echo '<pre>';print_r($allCourses->id);
?>
	
	<div class="col-md-6 col-sm-6 col-xs-12">
	<div class="singleCourseGreen singleCourseInfo">
		<div class="col-md-5 col-sm-12 col-xs-12 noleft">
			<div class="singleCourseImage"><img alt="test" src="<?php echo Url::to('@bsource').'/'.$allCourses->courseImage; ?>" alt="<?php echo $allCourses->courseImage; ?>" width="160" height="120"></div>
		</div>

		<div class="col-md-7 col-sm-12 col-xs-12">
			<div class="singleCourseContent">
				<h4><?php echo $allCourses->title; ?></h4>

				<ul>
					<li>Duration: 1 &nbsp;Minute</li>
					<li>Get Certified</li>
					<li>New Questions</li>
					<li>Realize your mistakes</li>
				</ul>
				<a class="readMore pull-right" href="<?php echo Yii::$app->urlManager->createUrl('courses/'.Yii::$app->Common->createSecretUrl($allCourses->id)) ?>"><?php echo $allCourses->title; ?></a>
			</div>
		</div>
	</div>
</div>
<?php
		}
	} else if($subcourse){
		foreach ($subcourse as $subcourses) {
			//echo '<pre>'; print_r($subcourses);
			$user_id = Yii::$app->user->identity->id;
					$quiz_passed = Yii::$app->Common->passedQuiz($subcourses->course_id,$subcourses->id,$user_id);
?>

			<div class="col-md-6 col-sm-6 col-xs-12">
	<div class="singleCoursePink singleCourseInfo">
		<div class="col-md-5 col-sm-12 col-xs-12 noleft">
			<div class="singleCourseImage"><img alt="test" src="<?php echo Url::to('@bsourc').'/'.$subcourses->image; ?>" alt="<?php echo $subcourses->image; ?>" width="160" height="120"></div>
		</div>

		<div class="col-md-7 col-sm-12 col-xs-12">
			<div class="singleCourseContent">
				<h4><?php echo $subcourses->title; ?></h4>

				<ul>
					<li>Duration: 1 &nbsp;Minute</li>
					<li>Get Certified</li>
					<li>New Questions</li>
					<li>Realize your mistakes</li>
				</ul>
				<?php if($quiz_passed){ ?>
				<a class="readMore pull-right" href="<?php echo Yii::$app->urlManager->createUrl('print-certificate/'.Yii::$app->Common->createSecretUrl($subcourses->course_id).'/'.Yii::$app->Common->createSecretUrl($subcourses->id))?>"><i class="fa fa-file-pdf-o fa-2x" title="Print PDF"></i></a>
				<?php } else { ?>
				<a class="readMore pull-right" href="<?php echo Yii::$app->urlManager->createUrl('show-quiz/'.Yii::$app->Common->createSecretUrl($subcourses->course_id).'/'.Yii::$app->Common->createSecretUrl($subcourses->id))?>">Attend Test</a>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
<?php
		}
	} else {
?>
No Sub Courses !
<?php } ?>
</div>