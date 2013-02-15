<?php
/* @var $this SceneDevicesController */
/* @var $model SceneDevices */

$this->breadcrumbs=array(
	'Scene Devices'=>array('index'),
	'Add',
);

$this->menu=array(
	array('label'=>'List Scenes', 'url'=>array('/scene/index')),	
);
?>

<h1>Add Scene Device</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>