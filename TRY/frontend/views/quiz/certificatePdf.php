<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use app\helpers\Common;
use yii\helpers\Url;


$this->title = 'Course Certificate';
$this->params['breadcrumbs'][] = $this->title;
if($result){
      //echo '<pre>'; print_r($result);
      $course_name   = Yii::$app->Common->getCourseName($result['courseId']);
      $topic_name    = Yii::$app->Common->getSubCourseName($result['topicId']);
      $stu_mark      = $result['stuMark'];
      $user_name     = Yii::$app->user->identity['username'];
      $dated         = Yii::$app->Common->customDate($result['createdOn']);
?>
      
      <div style="width:800px; height:600px; padding:20px; text-align:center; border: 10px solid #787878; background-image: url(<?php echo $this->theme->baseUrl; ?>/assets/images/certif.jpeg);" id="certificate_page">
      <div style="width:750px; height:550px; padding:20px; text-align:center; border: 5px solid #787878">
             <span style="font-size:50px; font-weight:bold">Certificate of Completion</span>
             <br><br>
             <span style="font-size:25px"><i>This is to certify that</i></span>
             <br><br>
             <span style="font-size:30px"><b><?= $user_name; ?></b></span><br/><br/>
             <span style="font-size:25px"><i>has completed the course</i></span> <br/><br/>
             <span style="font-size:30px"><?= $course_name; ?>, <?= $topic_name['title']; ?></span> <br/><br/>
             <span style="font-size:20px">with score of</span><br>
             <span style="font-size:25px"><b><?= $stu_mark; ?></b> Out Of <b>10</b></span><br>
             <span style="font-size:25px"><i>dated</i></span><br>
             <span style="font-size:25px"><?= $dated; ?></span>
      </div>

      
<?php } else {?>
      It seems that you have some issue please deal with it and Try to Attend the Test once again...!
<?php } ?>