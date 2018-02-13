<?php
use yii\helpers\Html;
use yii\helpers\Url;
use backend\models\Page;
use backend\models\VisitorCount;
//$result = Yii::$app->Common->getPages();
$result = Page::find()->where(['status' =>'Published','seoTitle'=>'footer-contact-us'])->one();

$count = count(VisitorCount::find()->all());
?>

<div class="section4">
  <div class="container">
    <div class="col-md-3 zero">
      <h3>Quick Links</h3>
      <ul class="foot">
        <li><a href="<?php echo Yii::$app->homeUrl; ?>" title="Home" alt="Home">Home</a></li>
        <li><a href="<?php echo Yii::$app->urlManager->createUrl(['/about-us']) ?>" title="About Us" alt="About Us">About Us</a></li>
        <li><a href="<?php echo Yii::$app->urlManager->createUrl(['/academic'])?>" title="Academic" alt="Academic">Academic</a></li>
        <li><a href="<?php echo Yii::$app->urlManager->createUrl(['/facilities'])?>" title="Facilities" alt="Facilities">Facilities</a></li>
        <li><a href="<?php echo Yii::$app->urlManager->createUrl(['/activities'])?>" title="Activities" alt="Activities">Activities</a></li>
        <li><a href="<?php echo Yii::$app->urlManager->createUrl(['/alumni'])?>" title="Alumni" alt="Alumni">Alumni</a></li>
        <li><a href="<?php echo Yii::$app->urlManager->createUrl(['albums/index']) ?>" title="Photo Gallery" alt="Photo Gallery">Photo Gallery</a></li>
        <li><a href="<?php echo Yii::$app->urlManager->createUrl(['feedback']) ?>" title="Feedback" alt="Feedback">Feedback</a></li>
        <li><a href="<?php echo Yii::$app->urlManager->createUrl(['/contact-us']) ?>" title="Contact Us" alt="Contact Us">Contact Us</a></li>
      </ul>
    </div>
    <div class="col-md-5 zero-right">
      <h3>Location Map</h3>
      <a href="https://www.google.co.in/maps/@25.5277936,90.2097659,15.75z?hl=en" target="_blank" ><img width="373" height="217" class="img-responsive" src="<?php echo $this->theme->baseUrl; ?>/frontend/assets/images/map.jpg" alt="Go to Google Map" title="Go to Google Map" alt="Go to Google Map"/></a> <br />
      <h5 style="color:#fff;"> Visitors Count<span class="count"><?php echo $count; ?></span> </h5>
    </div>
    <div class="col-md-4 zero-left">
      <h3>Contact Us</h3>
      <?php if($result){ ?>
      <?php echo $result->description;?>
      <?php } ?>
    </div>
  </div>
</div>
<div class="footer">
  <div class="container">
    <div class="col-md-8 zero-left">
        <p><span class="pullleft">&copy; <span> <?php echo date("Y");?><a href="<?php echo Yii::$app->homeUrl; ?>" title="Don Bosco College of Teacher Education, Tura"> Don Bosco College of Teacher Education, Tura </a> </span> All Rights Reserved. Powered by </span><span><a href="http://boscosofttech.com/" target="_blank" title="Boscosoft Technologies"><img width="111" height="28" class="img-responsive pullleft ico" src="<?php echo $this->theme->baseUrl; ?>/frontend/assets/images/boscosoft-logo.png" /></a></p>
      <div class="clearfix"></div>
    </div>
    <div class="col-md-4 zero-right">
      <ul id="social-networking">
        <a href="#">
        <li class="facebook" title="Google"> </li>
        </a> <a href="#">
        <li class="google" title="Facebook"></li>
        </a> <a href="#">
        <li class="twitter" title="Twitter"> </li>
        </a> <a href="#">
        <li class="linkedin" title="Linkedin"> </li>
        </a>
      </ul>
    </div>
  </div>
</div>
