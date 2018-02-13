<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\User;
use yii\helpers\ArrayHelper;
use backend\models\Country;
use backend\models\State;
use backend\models\City;

$this->title = 'Update Profile';
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
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data','class'=>'form-horizontal']]); ?>
    <div class="form-group">
      <label class="col-lg-4 control-label zero" for="coupon name">Username</label>
      <div class="col-lg-7 zero">
        <?= $form->field($model, 'username')->textInput(['maxlength' => 100,'placeholder'=>'Username'])->label(FALSE); ?>
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-4 control-label zero" for="coupon name">Email</label>
      <div class="col-lg-7 zero">
        <?= $form->field($model, 'email')->textInput(['maxlength' => 100,'placeholder'=>'Email','disabled'=>'disabled'])->label(FALSE); ?>
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-4 control-label zero" for="coupon name">Gender</label>
      <div class="col-lg-7 zero">
        <?= $form->field($model, 'gender')->radioList(['Male'=>'Male','Female'=>'Female'], ['id' => 'gender'])->label(FALSE); ?>
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-4 control-label zero" for="coupon name">Date Of Birth</label>
      <div class="col-lg-7 zero">
        <?= $form->field($model, 'dob')->textInput(['placeholder'=>'mm-dd-yyyy','id'=>'dates'])->label(FALSE); ?>
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-4 control-label zero" for="coupon name">Mobile Number</label>
      <div class="col-lg-7 zero">
        <?= $form->field($model, 'mobileNo')->textInput(['maxlength' => 100,'placeholder'=>'Mobile Number'])->label(FALSE); ?>
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-4 control-label zero" for="coupon name">Profile Status</label>
      <div class="col-lg-7 zero">
        <?= $form->field($model, 'profileStatus')->textInput(['maxlength' => 100,'placeholder'=>'Profile Status'])->label(FALSE); ?>
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-4 control-label zero" for="coupon name">Address</label>
      <div class="col-lg-7 zero">
        <?= $form->field($model, 'address')->textarea(['row'=>'6','maxlength' => 500,'placeholder'=>'Address'])->label(FALSE); ?>
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-4 control-label zero" for="coupon name">Country</label>
      <div class="col-lg-7 zero">
        <?php /*<?= $form->field($model, 'username')->textInput(['placeholder'=>'Country'])->label(FALSE); ?> */ ?>

        <?= $form->field($model, 'country')->dropDownList(ArrayHelper::map(Country::find()->orderBy('name ASC')->all(), 'id', 'name'), [
                    'prompt' => 'Select',
                    'class' => 'form-control',
                    'id' => 'country',
                    'onchange' => '$.get( "' . Yii::$app->urlManager->createUrl('user/get-state') . '", { id: $(this).val() } )
                                                        .done(function( data ) {
                                                          //alert(data);
                                                          $( "#state" ).html( data );
                                                          $( "#city" ).html("<option>Select</option>");
                                                        }
                                                    );
                                                ',])->label(FALSE); ?>
      </div>
    </div>
      <?php
          if ($model->state) {  
              $rows = State::find()->where('id=:id OR country_id=:country ORDER BY name ASC', ['id' => $model->state, ':country' => $model->country])->all(
                );
              if($model->city){
                $rows_city = City::find()->where('id=:id OR state_id=:state ORDER BY name ASC',['id'=> $model->city,':state'=> $model->state])->all();
              } else {
                $rows_city = City::find()->where('state_id=:state_id ORDER BY name ASC', [':state_id' => $model->state])->all();  
              }
          } else {
              $rows = State::find()->where('country_id=:country_id ORDER BY name ASC', [':country_id' => $model->country])->all();
              if($model->city){
                $rows_city = City::find()->where('id=:id OR state_id=:state ORDER BY name ASC',['id'=> $model->city,':state'=> $model->state])->all();
              } else {
                $rows_city = City::find()->where('state_id=:state_id ORDER BY name ASC', [':state_id' => $model->state])->all();  
              }
          }
      ?>
      
    <div class="form-group">
      <label class="col-lg-4 control-label zero" for="coupon name">State</label>
      <div class="col-lg-7 zero">
        <?php 
          $data = ArrayHelper::map($rows, 'id', 'name');
          echo $form->field($model, 'state')->dropDownList($data, [
                    'prompt' => 'Select',
                    'class' => 'form-control',
                    'id' => 'state',
                    'onchange' => '$.get( "' . Yii::$app->urlManager->createUrl('user/get-city') . '", { id: $(this).val() } )
                                                        .done(function( data ) {
                                                          alert(data);
                                                          $( "#city" ).html( data );
                                                        }
                                                    );
                                                ',])->label(FALSE); ?>
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-4 control-label zero" for="coupon name">City</label>
      <div class="col-lg-7 zero">
        <?php 
          $dataCity = ArrayHelper::map($rows_city, 'id', 'name');
          echo $form->field($model, 'city')->dropDownList($dataCity, ['prompt' => 'Select', 'class' => 'form-control','id'=>'city'])->label(FALSE);
        ?>
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-4 control-label zero" for="coupon name">Zip Code</label>
      <div class="col-lg-7 zero">
        <?= $form->field($model, 'zip')->textInput(['maxlength' => 10,'placeholder'=>'Zip Code'])->label(FALSE); ?>
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-4 control-label zero" for="coupon name">User Image</label>
      <div class="col-lg-8 zero">
        <img src="<?php echo Yii::$app->Common->setImage($model->userImage); ?>" class="img-rounded" width="100" height="75">
        <?= $form->field($model, 'userImage')->fileInput(['class'=>'btn btn-info','accept'=>".jpg,.jpeg,.png",'id'=>'userImage'])->label(FALSE); ?>
        <?= $form->field($model, 'existingImage')->hiddenInput(['value' => $model->userImage])->label(FALSE); ?>
        <div class="msg"> - Allowed File Types: .jpeg, .jpg, .png<br />
              - Maximum File Size: 2 MB<br />
            </div>
      </div>
      
    </div> 
    <div class="form-group">
    <label class="col-lg-4 control-label zero" for="coupon name"></label>
    <div class="col-lg-8 zero">
      <?= Html::submitButton($model->isNewRecord ? 'Save' : 'Update Profile', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
      <a href="<?php echo Yii::$app->urlManager->createUrl('site/')?>"><button type="button" class="btn btn-danger">Cancel</button></a>
    </div>
    </div>
    <?php ActiveForm::end(); ?>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
    $('#dates').datepicker({  
       format: 'dd-mm-yyyy',
       todayHighlight:true,
       endDate:"+0d",
       autoclose:true
     });
  });  
</script>  