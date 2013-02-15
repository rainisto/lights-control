<?php
/* @var $this DevicesController */
/* @var $data Devices */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idtbl_device')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idtbl_device), array('view', 'id'=>$data->idtbl_device)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tbl_device_name')); ?>:</b>
	<?php echo CHtml::encode($data->tbl_device_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tbl_device_nodeid')); ?>:</b>
	<?php echo CHtml::encode($data->tbl_device_nodeid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tbl_device_type')); ?>:</b>
	<?php echo CHtml::encode($data->tbl_device_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tbl_rooms_idtbl_room')); ?>:</b>
	<?php echo CHtml::encode($data->tbl_rooms_idtbl_room); ?>
	<br />


</div>