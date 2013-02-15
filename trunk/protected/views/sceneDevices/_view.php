<?php
/* @var $this SceneDevicesController */
/* @var $data SceneDevices */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idtbl_scene_device')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idtbl_scene_device), array('view', 'id'=>$data->idtbl_scene_device)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tbl_scene_idtbl_scene')); ?>:</b>
	<?php echo CHtml::encode($data->tbl_scene_idtbl_scene); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tbl_devices_idtbl_device')); ?>:</b>
	<?php echo CHtml::encode($data->tbl_devices_idtbl_device); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tbl_scene_device_level')); ?>:</b>
	<?php echo CHtml::encode($data->tbl_scene_device_level); ?>
	<br />


</div>