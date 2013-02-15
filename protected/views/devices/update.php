<?php
/* @var $this DevicesController */
/* @var $model Devices */

$this->breadcrumbs=array(
	'Devices'=>array('index'),
	$model->tbl_device_name=>array('view','id'=>$model->idtbl_device),
	'Update',
);

$this->menu=array(
	array('label'=>'List Devices', 'url'=>array('admin')),	
	array('label'=>'View Device', 'url'=>array('view', 'id'=>$model->idtbl_device)),
);
?>

<h1>Update Device</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>