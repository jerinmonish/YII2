<!-- <div class="page-wrapper">
<article class="contact-form col-md-8 col-sm-7  page-row">                            
                            <h3 class="title">Get in touch</h3>
                            <p>We’d love to hear from you. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ut erat magna. Aliquam porta sem a lacus imperdiet posuere. Integer semper eget ligula id eleifend. </p>
                            <form>
                                <div class="form-group name">
                                    <label for="name">Name</label>
                                    <input id="name" type="text" class="form-control" placeholder="Enter your name">
                                </div><!--//form-group-->
                               <!-- <div class="form-group email">
                                    <label for="email">Email<span class="required">*</span></label>
                                    <input id="email" type="email" class="form-control" placeholder="Enter your email">
                                </div><!--//form-group-->
                               <!-- <div class="form-group phone">
                                    <label for="phone">Phone</label>
                                    <input id="phone" type="tel" class="form-control" placeholder="Enter your contact number">
                                </div><!--//form-group-->
                                <!--<div class="form-group message">
                                    <label for="message">Message<span class="required">*</span></label>
                                    <textarea id="message" class="form-control" rows="6" placeholder="Enter your message here..."></textarea>
                                </div><!--//form-group-->
                                <!--<button type="submit" class="btn btn-theme">Send message</button>
                            </form>                  
                        </article>
                        </div> -->

                        <?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\User;
use yii\helpers\ArrayHelper;
//echo '<pre>';print_r($model);exit;
/* @var $this yii\web\View */
/* @var $model app\models\user */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Change Password';
//$this->params['breadcrumbs'][] = ['label' => 'user', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = $this->title;
?>

<h1>
  <?= Html::encode($this->title) ?>
</h1>
<div class="user-grid-form">
  <?= Yii::$app->session->getFlash('msg'); ?>
  <div class="col-md-6 zero">
    <?php $form = ActiveForm::begin(); ?>
    <div class="form-group">
      <label class="col-lg-4 control-label zero" for="coupon name">Old Password</label>
      <div class="col-lg-7 zero">
        <?= $form->field($model, 'oldPassword')->passwordInput(['maxlength' => 100,'placeholder'=>'Old Password'])->label(FALSE); ?>
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-4 control-label zero" for="coupon name">New Password</label>
      <div class="col-lg-7 zero">
        <?= $form->field($model, 'newPassword')->passwordInput(['maxlength' => 100,'placeholder'=>'New Password'])->label(FALSE); ?>
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-4 control-label zero" for="coupon name">Confirm Password</label>
      <div class="col-lg-7 zero">
        <?= $form->field($model, 'confirmPassword')->passwordInput(['maxlength' => 100,'placeholder'=>'Confirm Password'])->label(FALSE); ?>
      </div>
    </div> <div class="col-lg-offset-4 zero">
    <?= Html::submitButton($model->isNewRecord ? 'Save' : 'Change Password', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>
  </div>
</div>
<br><br><br><br><br><br><br><br><br><br><br>