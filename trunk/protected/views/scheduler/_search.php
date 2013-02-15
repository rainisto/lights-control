<?php
/* @var $this SchedulerController */
/* @var $model Scheduler */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idtbl_schedule'); ?>
		<?php echo $form->textField($model,'idtbl_schedule'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tbl_schedule_title'); ?>
		<?php echo $form->textField($model,'tbl_schedule_title',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tbl_schedule_date'); ?>
		<?php echo $form->textField($model,'tbl_schedule_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tbl_schedule_time_on'); ?>
		<?php echo $form->textField($model,'tbl_schedule_time_on'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tbl_schedule_time_off'); ?>
		<?php echo $form->textField($model,'tbl_schedule_time_off'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tbl_schedule_recurring'); ?>
		<?php echo $form->textField($model,'tbl_schedule_recurring',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tbl_scenes_idtbl_scene'); ?>
		<?php echo $form->textField($model,'tbl_scenes_idtbl_scene'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->