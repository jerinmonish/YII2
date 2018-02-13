<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\User;
use yii\helpers\ArrayHelper;
use backend\models\Country;
use backend\models\State;
use backend\models\City;

$this->title = 'View Profile';
//$this->params['breadcrumbs'][] = ['label' => 'user', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = $this->title;
//echo '<pre>';print_r($model);exit;
?>

<h1>
  <?= Html::encode($this->title) ?>
</h1>
<div class="user-grid-form">
  <?= Yii::$app->session->getFlash('msg'); ?>
  <div class="col-md-6 zero">
    <div class="form-group">
      <label class="col-lg-4 control-label zero" for="coupon name">Username</label>
      <div class="col-lg-7 zero">
        <label><?php echo $model->username; ?></label>
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-4 control-label zero" for="coupon name">Email</label>
      <div class="col-lg-7 zero">
        <label><?php echo $model->email; ?></label>
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-4 control-label zero" for="coupon name">Gender</label>
      <div class="col-lg-7 zero">
        <label><?php echo $model->gender; ?></label>
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-4 control-label zero" for="coupon name">Date Of Birth</label>
      <div class="col-lg-7 zero">
        <label><?php echo Yii::$app->Common->customDate($model->dob); ?></label>
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-4 control-label zero" for="coupon name">Mobile Number</label>
      <div class="col-lg-7 zero">        
        <label><?php echo $model->mobileNo; ?></label>
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-4 control-label zero" for="coupon name">Profile Status</label>
      <div class="col-lg-7 zero">
        <label><?php echo $model->profileStatus; ?></label>
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-4 control-label zero" for="coupon name">Address</label>
      <div class="col-lg-7 zero">
        <label><?php echo $model->address; ?></label>
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-4 control-label zero" for="coupon name">Country</label>
      <div class="col-lg-7 zero">
        <label><?php echo Yii::$app->Common->getCountryName($model->country); ?></label>
      </div>
    </div>
      
    <div class="form-group">
      <label class="col-lg-4 control-label zero" for="coupon name">State</label>
      <div class="col-lg-7 zero">
        <label><?php echo Yii::$app->Common->getstateName($model->state); ?></label>
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-4 control-label zero" for="coupon name">City</label>
      <div class="col-lg-7 zero">
        <label><?php echo Yii::$app->Common->getCityName($model->city); ?></label>
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-4 control-label zero" for="coupon name">Zip Code</label>
      <div class="col-lg-7 zero">
        <label><?php echo $model->zip; ?></label>
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-4 control-label zero" for="coupon name">User Image</label>
      <div class="col-lg-8 zero">
        <img src="<?php echo Yii::$app->Common->setImage($model->userImage); ?>" class="img-circle" width="75" height="75">
      </div>
    </div> 

    <div class="form-group">
    <label class="col-lg-4 control-label zero" for="coupon name"></label>
    <div class="col-lg-8 zero">
      <a href="<?php echo Yii::$app->urlManager->createUrl('site/')?>"><button type="button" class="btn btn-info">Back</button></a>
    </div>
    </div>
  </div>
</div>