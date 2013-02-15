<?php
/* @var $this FloorsController */
/* @var $model Floors */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idtbl_floor'); ?>
		<?php echo $form->textField($model,'idtbl_floor'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tbl_floor_name'); ?>
		<?php echo $form->textField($model,'tbl_floor_name',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->