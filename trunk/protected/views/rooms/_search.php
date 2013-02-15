<?php
/* @var $this RoomsController */
/* @var $model Rooms */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idtbl_room'); ?>
		<?php echo $form->textField($model,'idtbl_room'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tbl_room_name'); ?>
		<?php echo $form->textField($model,'tbl_room_name',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tbl_floors_idtbl_floor'); ?>
		<?php echo $form->textField($model,'tbl_floors_idtbl_floor'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->