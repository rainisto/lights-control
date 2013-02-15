<?php
/* @var $this SceneDevicesController */
/* @var $model SceneDevices */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idtbl_scene_device'); ?>
		<?php echo $form->textField($model,'idtbl_scene_device'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tbl_scene_idtbl_scene'); ?>
		<?php echo $form->textField($model,'tbl_scene_idtbl_scene'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tbl_devices_idtbl_device'); ?>
		<?php echo $form->textField($model,'tbl_devices_idtbl_device'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tbl_scene_device_level'); ?>
		<?php echo $form->textField($model,'tbl_scene_device_level'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->