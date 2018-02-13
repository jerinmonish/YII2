<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
<div class="cls-content">
<?= Yii::$app->session->getFlash('msg'); ?>
            <?php if (Yii::$app->session->hasFlash('success')) { ?>
                <div class="alert alert-success" role="alert">
                    <?= Yii::$app->session->getFlash('success') ?>
                </div>
            <?php } else if (Yii::$app->session->hasFlash('error')) { ?>
                <div class="alert alert-danger" role="alert">
                    <?= Yii::$app->session->getFlash('error') ?>
                </div>
            <?php } ?>
            <div class="cls-content-sm panel">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                <div class="panel-body">
                    <p class="pad-btm">Sign In to your account</p>
                    <form action="index.html">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                <!--input type="text" class="form-control" placeholder="Username"-->
                                <?= Html::activeTextInput($model, 'username', ['placeholder' => 'Username', 'class' => 'form-control','required'=>'required']); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                                <!--input type="password" class="form-control" placeholder="Password"-->
                                <?= Html::activepasswordInput($model, 'password', ['placeholder' => 'Password', 'class' => 'form-control','required'=>'required']); ?>
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
                                    <?= Html::submitButton('Login', ['class' => 'btn btn-success text-uppercase', 'name' => 'login-button']) ?>
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
