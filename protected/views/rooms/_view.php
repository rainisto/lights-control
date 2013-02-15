<?php
/* @var $this RoomsController */
/* @var $data Rooms */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idtbl_room')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idtbl_room), array('view', 'id'=>$data->idtbl_room)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tbl_room_name')); ?>:</b>
	<?php echo CHtml::encode($data->tbl_room_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tbl_floors_idtbl_floor')); ?>:</b>
	<?php echo CHtml::encode($data->tbl_floors_idtbl_floor); ?>
	<br />


</div>