<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\AlbumRefrence */
/* @var $form yii\widgets\ActiveForm */
$getAlbum = Yii::$app->Common->getAlbumName(Yii::$app->user->identity->id);
?>

<div class="album-refrence-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'albumId')->dropDownList($getAlbum,['prompt'=>'Choose an item'])->label('Album Refrence'); ?>

    Existing Album Icon
	<?php
		$exp = explode(',', $model->pics);
		//print_r($exp);
		foreach ($exp as $key => $value) {
		?>
			<a href="#" data-imgid="<?php echo $value; ?>" class="mul_imgs">
				<img src="<?php echo Yii::$app->homeUrl.'uploads/user_album_img/'.$value; ?>" alt="Smiley face" height="42" width="42">-
			</a>
		<?php
		//echo '<pre>';print_r($value);
		}
	?>

    <?= $form->field($model, 'pics[]')->fileInput(['multiple' => true])->label('Image'); ?>

    <?= $form->field($model, 'photoOrder')->textInput()->label('Photo Order'); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script type="text/javascript">
	$(document).ready(function(){
		$(".mul_imgs").click(function(){
			//alert($(this).attr('data-imgid'));
		})
	})
</script>