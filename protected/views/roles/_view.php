<?php
/* @var $this RolesController */
/* @var $data Roles */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idtbl_role')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idtbl_role), array('view', 'id'=>$data->idtbl_role)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tbl_role_title')); ?>:</b>
	<?php echo CHtml::encode($data->tbl_role_title); ?>
	<br />


</div>