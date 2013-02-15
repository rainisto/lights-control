<?php
/* @var $this FloorsController */
/* @var $data Floors */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idtbl_floor')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idtbl_floor), array('view', 'id'=>$data->idtbl_floor)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tbl_floor_name')); ?>:</b>
	<?php echo CHtml::encode($data->tbl_floor_name); ?>
	<br />


</div>