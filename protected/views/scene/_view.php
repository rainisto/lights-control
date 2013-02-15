<?php
/* @var $this SceneController */
/* @var $data Scene */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idtbl_scene')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idtbl_scene), array('view', 'id'=>$data->idtbl_scene)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tbl_scene_title')); ?>:</b>
	<?php echo CHtml::encode($data->tbl_scene_title); ?>
	<br />


</div>