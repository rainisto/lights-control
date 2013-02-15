<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idtbl_user'); ?>
		<?php echo $form->textField($model,'idtbl_user'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tbl_user_login'); ?>
		<?php echo $form->textField($model,'tbl_user_login',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tbl_user_email'); ?>
		<?php echo $form->textField($model,'tbl_user_email',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tbl_user_notifications'); ?>
		<?php echo $form->textField($model,'tbl_user_notifications'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tbl_roles_idtbl_role'); ?>
		<?php echo $form->textField($model,'tbl_roles_idtbl_role'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->