<?php
/* @var $this SchedulerController */
/* @var $data Scheduler */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idtbl_schedule')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idtbl_schedule), array('view', 'id'=>$data->idtbl_schedule)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tbl_schedule_title')); ?>:</b>
	<?php echo CHtml::encode($data->tbl_schedule_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tbl_schedule_date')); ?>:</b>
	<?php echo CHtml::encode($data->tbl_schedule_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tbl_schedule_time_on')); ?>:</b>
	<?php echo CHtml::encode($data->tbl_schedule_time_on); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tbl_schedule_time_off')); ?>:</b>
	<?php echo CHtml::encode($data->tbl_schedule_time_off); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tbl_schedule_recurring')); ?>:</b>
	<?php echo CHtml::encode($data->tbl_schedule_recurring); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tbl_scenes_idtbl_scene')); ?>:</b>
	<?php echo CHtml::encode($data->tbl_scenes_idtbl_scene); ?>
	<br />


</div>