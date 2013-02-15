<?php
/* @var $this UsersController */
/* @var $data Users */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idtbl_user')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idtbl_user), array('view', 'id'=>$data->idtbl_user)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tbl_user_login')); ?>:</b>
	<?php echo CHtml::encode($data->tbl_user_login); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tbl_user_password')); ?>:</b>
	<?php echo CHtml::encode($data->tbl_user_password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tbl_user_email')); ?>:</b>
	<?php echo CHtml::encode($data->tbl_user_email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tbl_user_notifications')); ?>:</b>
	<?php echo CHtml::encode($data->tbl_user_notifications); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tbl_roles_idtbl_role')); ?>:</b>
	<?php echo CHtml::encode($data->tbl_roles_idtbl_role); ?>
	<br />


</div>