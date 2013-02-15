<?php
/* @var $this SceneDevicesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Scene Devices',
);

$this->menu=array(
	array('label'=>'Create SceneDevices', 'url'=>array('create')),
	array('label'=>'Manage SceneDevices', 'url'=>array('admin')),
);
?>

<h1>Scene Devices</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
