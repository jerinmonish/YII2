<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Course */
/* @var $form yii\widgets\ActiveForm */
?>
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
					<label class="col-sm-1 control-label" for="demo-hor-inputemail">Course Name</label>
				</div>
				<div class="col-sm-4">
					<?= $form->field($model, 'course_id')->textInput()->label(false) ?>
				</div>
			</div>
			<div class="col-md-12">
				<div class="col-sm-1">
					<label class="col-sm-1 control-label" for="demo-hor-inputemail">Topic Title</label>
				</div>
				<div class="col-sm-4">
					<!--input type="email" placeholder="Email" id="demo-hor-inputemail" class="form-control"-->
					<?= $form->field($model, 'title')->textInput(['maxlength' => true])->label(false) ?>
				</div>
			</div>
			<div class="col-md-12">
				<div class="col-sm-1">
					<label class="col-sm-1 control-label" for="demo-hor-inputemail">Topic Description</label>
				</div>
				<div class="col-sm-4">
					<!--input type="email" placeholder="Email" id="demo-hor-inputemail" class="form-control"-->
					<?= $form->field($model, 'description')->textarea(['rows' => 6])->label(false) ?>
				</div>
			</div>
			<div class="col-md-12">
				<div class="col-sm-1">
					<label class="col-sm-1 control-label" for="demo-hor-inputemail">Topic Image</label>
				</div>
				<div class="col-sm-4">
					<!--input type="email" placeholder="Email" id="demo-hor-inputemail" class="form-control"-->
					<?= $form->field($model, 'image')->textInput(['maxlength' => true])->label(false) ?>
				</div>
			</div>
			</div>
			<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success ' : 'btn btn-primary']) ?>
			<?= Html::a(' << Back', ['/sub-course/'], ['class' => 'btn btn-default', 'title' => 'Back']) ?>
		</div>
		<!--div class="panel-footer text-right">
			<button></button>
		<div-->
	<?php ActiveForm::end(); ?>
	<!--===================================================-->
	<!--End Horizontal Form-->

	

</div>
