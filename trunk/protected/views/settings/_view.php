<?php
/* @var $this SettingsController */
/* @var $data Settings */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idtbl_settings')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idtbl_settings), array('view', 'id'=>$data->idtbl_settings)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tbl_settings_latitute_deg')); ?>:</b>
	<?php echo CHtml::encode($data->tbl_settings_latitute_deg); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tbl_settings_latitude_dir')); ?>:</b>
	<?php echo CHtml::encode($data->tbl_settings_latitude_dir); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tbl_settings_longitude_deg')); ?>:</b>
	<?php echo CHtml::encode($data->tbl_settings_longitude_deg); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tbl_settings_longitude_dir')); ?>:</b>
	<?php echo CHtml::encode($data->tbl_settings_longitude_dir); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tbl_settings_UUID')); ?>:</b>
	<?php echo CHtml::encode($data->tbl_settings_UUID); ?>
	<br />


</div>