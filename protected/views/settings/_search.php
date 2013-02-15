<?php
/* @var $this SettingsController */
/* @var $model Settings */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idtbl_settings'); ?>
		<?php echo $form->textField($model,'idtbl_settings'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tbl_settings_latitute_deg'); ?>
		<?php echo $form->textField($model,'tbl_settings_latitute_deg',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tbl_settings_latitude_dir'); ?>
		<?php echo $form->textField($model,'tbl_settings_latitude_dir',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tbl_settings_longitude_deg'); ?>
		<?php echo $form->textField($model,'tbl_settings_longitude_deg',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tbl_settings_longitude_dir'); ?>
		<?php echo $form->textField($model,'tbl_settings_longitude_dir',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tbl_settings_UUID'); ?>
		<?php echo $form->textField($model,'tbl_settings_UUID',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->