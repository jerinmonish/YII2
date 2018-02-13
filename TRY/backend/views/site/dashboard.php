<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Admin dashboard';
$this->params['breadcrumbs'][] = ['label' => 'Quizzes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php echo Yii::$app->session->getFlash('msg'); ?>
Welcome dear admin