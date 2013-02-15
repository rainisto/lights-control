<?php
/* @var $this SettingsController */
/* @var $model Settings */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'settings-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'tbl_settings_latitute_deg'); ?>
		<?php echo $form->textField($model,'tbl_settings_latitute_deg',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'tbl_settings_latitute_deg'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tbl_settings_latitude_dir'); ?>
		<?php echo $form->textField($model,'tbl_settings_latitude_dir',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'tbl_settings_latitude_dir'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tbl_settings_longitude_deg'); ?>
		<?php echo $form->textField($model,'tbl_settings_longitude_deg',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'tbl_settings_longitude_deg'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tbl_settings_longitude_dir'); ?>
		<?php echo $form->textField($model,'tbl_settings_longitude_dir',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'tbl_settings_longitude_dir'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tbl_settings_UUID'); ?>
		<?php echo $form->textField($model,'tbl_settings_UUID',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'tbl_settings_UUID'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->