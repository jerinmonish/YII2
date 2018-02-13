<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Course;
use backend\models\SubCourse;
/* @var $this yii\web\View */
/* @var $model backend\models\Quotes */
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
                    <label class="col-sm-1 control-label" for="demo-hor-inputemail">Question</label>
                </div>
                <div class="col-sm-4">
                    <?= $form->field($model, 'question')->textarea(['maxlength' => true])->label(false) ?>
                </div>
            </div>
            <div class="col-md-12">
                <div class="col-sm-1">
                    <label class="col-sm-1 control-label" for="demo-hor-inputemail">Option 1</label>
                </div>
                <div class="col-sm-4">
                    <?= $form->field($model, 'option1')->textarea(['maxlength' => true])->label(false) ?>
                </div>
            </div>
            <div class="col-md-12">
                <div class="col-sm-1">
                    <label class="col-sm-1 control-label" for="demo-hor-inputemail">Option 2</label>
                </div>
                <div class="col-sm-4">
                    <?= $form->field($model, 'option2')->textarea(['maxlength' => true])->label(false) ?>
                </div>
            </div>
            <div class="col-md-12">
                <div class="col-sm-1">
                    <label class="col-sm-1 control-label" for="demo-hor-inputemail">Option 3</label>
                </div>
                <div class="col-sm-4">
                    <?= $form->field($model, 'option3')->textarea(['maxlength' => true])->label(false) ?>
                </div>
            </div>
            <div class="col-md-12">
                <div class="col-sm-1">
                    <label class="col-sm-1 control-label" for="demo-hor-inputemail">Option 4</label>
                </div>
                <div class="col-sm-4">
                    <?= $form->field($model, 'option4')->textarea(['maxlength' => true])->label(false) ?>
                </div>
            </div>
            <div class="col-md-12">
                <div class="col-sm-1">
                    <label class="col-sm-1 control-label" for="demo-hor-inputemail">Answer</label>
                </div>
                <div class="col-sm-4">
                    <?= $form->field($model, 'answer')->textarea(['maxlength' => true])->label(false) ?>
                </div>
            </div>
            <div class="col-md-12">
                <div class="col-sm-1">
                    <label class="col-sm-1 control-label" for="demo-hor-inputemail">Course Name</label>
                </div>
                <div class="col-sm-4">
                    <?php
                        $getAllCourse = Yii::$app->Common->getCourseAll();
                        foreach ($getAllCourse as $courses) {
                            $field_data[$courses['id']]=$courses['title'];
                        }
                    ?>
                    <?php //$form->field($model, 'courseId')->dropDownList($field_data, ['prompt' => 'Choose a Course','id'=>'course_id'])->label(false) ?>
                    <?= $form->field($model, 'courseId')->dropDownList(ArrayHelper::map(Course::find()->orderBy('id asc')->all(), 'id', 'title'),['prompt' => 'Choose a Course','id'=>'course_id',
                    'onchange'=>'
                            $.post( "'.Yii::$app->urlManager->createUrl('site/get-sub-course?id=').'"+$(this).val(), function( data ) {
                            $( "#sub_course" ).html( data );
                            //alert(data);
                       });'
                    ])->label(false); ?>
                </div>
            </div>
            <div class="col-md-12">
                <div class="col-sm-1">
                    <label class="col-sm-1 control-label" for="demo-hor-inputemail">Sub Course</label>
                </div>
                <div class="col-sm-4">
                    <?php  //$form->field($model, 'topicId')->textInput()->label(false) ?>
                    <?php
                        if ($model->topicId) {
                            $rows = subCourse::find()->where('id=:id OR course_id=:course_id ORDER BY title ASC', ['id' => $model->topicId, ':course_id' => $model->topicId])->all();
                            //echo 'in';
                            //echo '<pre> Yes '; print_r($rows);
                        } else {
                            $rows = subCourse::find()->where('course_id=:course_id ORDER BY title ASC', [':course_id' => $model->topicId])->all();
                            //echo '<pre> No '; print_r($rows);
                            //echo 'out';
                        }

                        $data = ArrayHelper::map($rows, 'id', 'title');
                        echo $form->field($model, 'topicId')->dropDownList($data, ['prompt' => 'Select', 'class' => 'form-control','id'=>'sub_course'])->label(false);
                    ?>
                </div>
            </div>

            </div>
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success ' : 'btn btn-primary']) ?>
            <?= Html::a(' << Back', ['/quiz/'], ['class' => 'btn btn-default', 'title' => 'Back']) ?>
        </div>
        <!--div class="panel-footer text-right">
            <button></button>
        <div-->
    <?php ActiveForm::end(); ?>
    <!--===================================================-->
    <!--End Horizontal Form-->



</div>
<script type="text/javascript">
    $(document).ready(function() {
        $("#course_id").change(function() {
            //alert("in");
        });
    });
</script>
