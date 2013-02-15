<?php
/* @var $this DevicesController */
/* @var $model Devices */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idtbl_device'); ?>
		<?php echo $form->textField($model,'idtbl_device'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tbl_device_name'); ?>
		<?php echo $form->textField($model,'tbl_device_name',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tbl_device_nodeid'); ?>
		<?php echo $form->textField($model,'tbl_device_nodeid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tbl_device_type'); ?>
		<?php echo $form->textField($model,'tbl_device_type',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tbl_rooms_idtbl_room'); ?>
		<?php echo $form->textField($model,'tbl_rooms_idtbl_room'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->