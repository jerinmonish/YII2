<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
<div class="cls-content">
<?php echo Yii::$app->session->getFlash('msg'); ?>
            <div class="cls-content-sm panel">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                <div class="panel-body">
                    <p class="pad-btm">Sign In to your account</p>
                    <form action="index.html">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                <!--input type="text" class="form-control" placeholder="Username"-->
                                <?= $form->field($model, 'username')->textInput(['autofocus' => true,'class'=>"form-control"]) ?>
                                
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                                <!--input type="password" class="form-control" placeholder="Password"-->
                                <?= $form->field($model, 'password')->passwordInput(['class'=>"form-control"]) ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-8 text-left checkbox">
                                <!--label class="form-checkbox form-icon"-->
                                <!--input type="checkbox"> Remember me-->
                                <?= $form->field($model, 'rememberMe')->checkbox() ?>
                                <!--/label-->
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group text-right">
                                    <!--button class="btn btn-success text-uppercase" type="submit">Sign In</button-->
                                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
            <div class="pad-ver">
                <a href="pages-password-reminder.html" class="btn-link mar-rgt">Forgot password ?</a>
                <a href="pages-register.html" class="btn-link mar-lft">Create a new account</a>
            </div>
        </div>
