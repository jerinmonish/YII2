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
<link rel="stylesheet" href="<?php echo $this->theme->baseUrl; ?>/assets/css/img.css">   
<script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/assets/js/html2canvas.js"></script> 
<script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/assets/js/canvas2image.js"></script> 
      <!-- <div style="width:800px; height:600px; padding:20px; text-align:center; border: 10px solid #787878; background-image: url(https://avante.biz/wp-content/uploads/Creative-Backgrounds-Wallpapers/Creative-Backgrounds-Wallpapers-029.jpg); background-size: 950px;"> 
      https://i.pinimg.com/originals/12/e2/97/12e29760db58b1aea75dd415b9722e90.jpg
      -->
      <div class="pull-right">
            <button class="btn btn-info" id="send_mail">
                  <i class="fa fa-cloud-upload" aria-hidden="true"></i>Mail
            </button>
            <br><br>            
            <button class="btn btn-info" id="" onClick="printdiv('certificate_page');" value="Print">
                  <i class="fa fa-print" aria-hidden="true"></i>Print
            </button>
            <br><br>
            <a href="<?php echo Yii::$app->urlManager->createUrl('print-pdf/'.Yii::$app->Common->createSecretUrl($result['courseId']).'/'.Yii::$app->Common->createSecretUrl($result['topicId'])) ?>">
            <button class="btn btn-info" id="">
                  <i class="fa fa-file-pdf-o" aria-hidden="true"></i>PDF
            </button>
            </a>
            <button class="btn btn-danger" id="download">
                  <i class="fa fa-download" aria-hidden="true"></i>Image
            </button>
      </div>
      <span id="widget" class="widget">
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
      </div>
      </span>
      <!-- <div id="img-out"></div> -->
      
<?php } else {?>
      It seems that you have some issue please deal with it and Try to Attend the Test once again...!
<?php } ?>

<script type="text/javascript">
      function printdiv(printpage)
      {
            var headstr = "<html><head><title></title></head><body>";
            var footstr = "</body>";
            var newstr = document.all.item(printpage).innerHTML;
            var oldstr = document.body.innerHTML;
            document.body.innerHTML = headstr+newstr+footstr;
            window.print();
            document.body.innerHTML = oldstr;
            return false;
      }

      $(document).ready(function(){
            $("#pdf").click(function(){
              //alert("in");
                  var a = '<?php echo $course_name; ?>';
                  var b = "<?php echo $topic_name['title']; ?>";
                  var c = '<?php echo $stu_mark; ?>';
                  var d = '<?php echo $user_name; ?>';
                  var e = '<?php echo $dated; ?>';
                  formData = {courseName:a,topicName:b,studentMark:c,userName:d,dated:e};
                  $.ajax({
                        url : "<?php echo Yii::$app->request->baseUrl.'/quiz/print-pdf' ?>",
                        type: "POST",
                        data : formData,
                        success : function (data){
                              if(data){
                                    alert(data);
                              }else{
                                    alert("out");
                              }
                        }
                  });
            });

            $("#send_mail").click(function(){
                  var a = '<?php echo $course_name; ?>';
                  var b = "<?php echo $topic_name['title']; ?>";
                  var c = '<?php echo $stu_mark; ?>';
                  var d = '<?php echo $user_name; ?>';
                  var e = '<?php echo $dated; ?>';
                  formData = {courseName:a,topicName:b,studentMark:c,userName:d,dated:e};
              $.ajax({
                        url : "<?php echo Yii::$app->request->baseUrl.'/quiz/send-mail' ?>",
                        type: "POST",
                        data : formData,
                        success : function (data){
                              if(data){
                                    //alert(data);
                              }else{
                                    //alert("out");
                              }
                        }
                  });
            });

          $(function() {
            $("#download").click(function() { 
              html2canvas($("#widget"), {
                onrendered: function(canvas) {
                theCanvas = canvas;
                document.body.appendChild(canvas);

                // Convert and download as image 
                Canvas2Image.saveAsPNG(canvas); 
                $("#img-out").append(canvas);
                // Clean up 
                //document.body.removeChild(canvas);
                }
              });
            });
          });


      });
</script>