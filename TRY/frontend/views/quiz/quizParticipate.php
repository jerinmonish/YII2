<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use app\helpers\Common;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

$this->title = 'Quiz';
$this->params['breadcrumbs'][] = $this->title;
//echo '<pre>';print_r($quizItem);

?>
<?php 
  //echo '<pre>';print_r($sub_course_id);exit;
  if(!empty(isset($quizItem) && isset($sub_course_id) && isset($course_id))){
    //foreach($quizItem as $key => $quiz){
    //echo '<pre>';print_r($quizItem);exit;
    
?>
<script type="text/javascript">
        $(function(){
          $("#ms_timer").countdowntimer({
            //minutes : 1,
            seconds : 10,
            size : "lg",
            //tickInterval : 5‚
            timeUp : timeIsUp,
            beforeExpiryTime : '00:00:00:05',
            beforeExpiryTimeFunction :  beforeExpiryFunc,
            //timeSeparator : "-"‚
            //expiryUrl : "https://www.google.com",
            borderColor : "pink",
            backgroundColor : "pink",
            fontColor : "#337ab7",
          });
          function timeIsUp() {
            //Code to be executed when timer expires.
            alert("Its time");
            document.getElementById("next").click();
          }

          function beforeExpiryFunc() {
            //Code to be executed before the timer expires (before 01:05).
            alert("More 5 mins");
          }
        });

        $(document).ready(function(){
          //alert("in");
          //$('#next').click();
          //$("#next").trigger('click'); 
          //document.getElementById("next").click();
        });
    </script>
			<div class="panel panel-primary">
			  <div class="panel-heading"><?php echo $quizItem[0]->question; ?></div>
			  <div class="panel-body">
        
        <?php  $form = ActiveForm::begin(['action' => Yii::$app->urlManager->createUrl("quiz/get-next"), 'id' => 'forum_post', 'method' => 'post',]); ?>
        <?php echo "<input type='radio' name='ans' value='".$quizItem[0]->option1."' required>".$quizItem[0]->option1; ?><br>
        <?php echo "<input type='radio' name='ans' value='".$quizItem[0]->option2."' required>".$quizItem[0]->option2; ?><br>
        <?php echo "<input type='radio' name='ans' value='".$quizItem[0]->option3."' required>".$quizItem[0]->option3; ?><br>
        <?php echo "<input type='radio' name='ans' value='".$quizItem[0]->option4."' required>".$quizItem[0]->option4; ?><br>
 

          <input type="text" name="id" value="<?php echo Yii::$app->Common->createSecretUrl($quizItem[0]->id); ?>">
          <input type="text" name="c_id" value="<?php echo Yii::$app->Common->createSecretUrl($course_id); ?>">
          <input type="text" name="sub_id" value="<?php echo Yii::$app->Common->createSecretUrl($sub_course_id); ?>">
			  </div>
			  <div class="panel-footer" style="padding:15px 20px 40px 0px">
			  	<div class="panel pull-right">
			  	<!-- <a href="<?php echo Yii::$app->urlManager->createUrl('quiz-next/'.Yii::$app->Common->createSecretUrl($quizItem[0]->id).'/'.Yii::$app->Common->createSecretUrl($course_id).'/'.Yii::$app->Common->createSecretUrl($sub_course_id))?>" id="next"><button class="btn btn-info">Next</button></a> -->
          <?= Html::submitButton('Next', ['class' => 'btn btn-primary', 'name' => 'next-button','id'=>'next']) ?>
			  	<!--a href="<?php //echo Yii::$app->urlManager->createUrl('quiz-previous/'.Yii::$app->Common->createSecretUrl($quizItem[0]->id)) ?>"><button class="btn btn-danger pull">Previous</button></a-->
        <?php ActiveForm::end(); ?>

			  	</div>
			  </div>
			</div>
<?php
			//echo '<pre>';print_r($quiz);
		//}
	} else {
		echo '<h1>No Any Questions !</h1>';
    echo '<h2>You will be redirected...Please wait !</h2>';
?>
  <div align="center">
        <a href="#" onclick="history.go(-1);"><img src="<?php //echo \Yii::$app->request->BaseUrl.\Yii::$app->params['EXTRA_UPLOAD_PATH'].'coming-soon.png';?>"></a>
        <script type="text/javascript">
        $(function(){
          $("#ms_timer").countdowntimer({
            seconds : 5,
            size : "lg",
            timeUp : timeIsUp,
            borderColor : "pink",
            backgroundColor : "#eee",
            fontColor : "black",
          });
          function timeIsUp() {
            history.go(-1);
          }
        });
        $(document).ready(function(){
          $(".top").text("Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.");
        })
    </script>
        </div>
<?php } ?>

