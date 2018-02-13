<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Quotes */
/* @var $form yii\widgets\ActiveForm */
?>

<!--div class="quotes-form">

    <?php /*$form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'quote')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList([ 'Active' => 'Active', 'Inactive' => 'Inactive', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'createdOn')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end();*/ ?>

</div-->
<div class="panel">
	<div class="panel-heading">
		<h3 class="panel-title"><?= $this->title; ?></h3>
	</div>

	<!--Horizontal Form-->
	<!--===================================================-->
	<?php $form = ActiveForm::begin(['options' => ['class' => 'form-horizontal']]); ?>
	<!--form class="form-horizontal"-->
		<div class="panel-body">
			<div class="form-group">
			<div class="col-md-12">
				<div class="col-sm-1">
					<label class="col-sm-1 control-label" for="demo-hor-inputemail">Quote</label>
				</div>
				<div class="col-sm-4">
					<!--input type="email" placeholder="Email" id="demo-hor-inputemail" class="form-control"-->
					<?= $form->field($model, 'quote')->textInput(['maxlength' => true,"placeholder"=>"Quote Text","id"=>"demo-hor-inputemail","class"=>"form-control"])->label(false) ?>
				</div>
			</div>
			<div class="col-md-12">
				<div class="col-sm-1">
					<label class="col-sm-1 control-label" for="demo-hor-inputemail">Status</label>
				</div>
				<div class="col-sm-4">
					<!--input type="email" placeholder="Email" id="demo-hor-inputemail" class="form-control"-->
					<?= $form->field($model, 'status')->dropDownList([ 'Active' => 'Active', 'Inactive' => 'Inactive', ], ['prompt' => 'Choose a status'],['class'=>'form-control','id'=>"demo-hor-inputpass"])->label(false) ?>
				</div>
			</div>
			</div>
			<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success ' : 'btn btn-primary']) ?>
			<?= Html::a(' << Back', ['/quotes/'], ['class' => 'btn btn-default', 'title' => 'Back']) ?>
		</div>
		<!--div class="panel-footer text-right">
			<button></button>
		<div-->
	<?php ActiveForm::end(); ?>
	<!--===================================================-->
	<!--End Horizontal Form-->

	

</div>
