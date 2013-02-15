<?php
/* @var $this SceneController */
/* @var $model Scene */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idtbl_scene'); ?>
		<?php echo $form->textField($model,'idtbl_scene'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tbl_scene_title'); ?>
		<?php echo $form->textField($model,'tbl_scene_title',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->