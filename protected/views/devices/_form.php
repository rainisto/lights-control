<?php
/* @var $this DevicesController */
/* @var $model Devices */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'devices-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'tbl_device_name'); ?>
		<?php echo $form->textField($model,'tbl_device_name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'tbl_device_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tbl_device_nodeid'); ?>
		<?php echo $form->dropDownList($model, 'tbl_device_nodeid', $this->zwDevices, array('empty' => 'Select device')); ?>
		<?php echo $form->error($model,'tbl_device_nodeid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tbl_device_type'); ?>
		<?php echo $form->textField($model,'tbl_device_type',array('size'=>60,'maxlength'=>100, 'disabled'=>'disabled')); ?>
		<?php echo $form->error($model,'tbl_device_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tbl_rooms_idtbl_room'); ?>
                <?php
                    $models = Rooms::model()->findAll(array('order' => 'tbl_room_name'));
                    $list = CHtml::listData($models, 'idtbl_room', 'tbl_room_name');
                    echo CHtml::dropDownList('Devices[tbl_rooms_idtbl_room]', $model->tblRoomsIdtblRoom, $list, array('empty' => 'Select room'));
                ?>
		<?php echo $form->error($model,'tbl_rooms_idtbl_room'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->