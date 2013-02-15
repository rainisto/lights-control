<?php
/* @var $this SceneDevicesController */
/* @var $model SceneDevices */

$this->breadcrumbs=array(
        'Scenes'=>array('/scene/index'),
	$model->tblSceneIdtblScene->tbl_scene_title=>array('/scene/view', 'id'=>$model->tblSceneIdtblScene->idtbl_scene),
	$model->tblDevicesIdtblDevice->tbl_device_name,
);

$this->menu=array(
	array('label'=>'List Scenes', 'url'=>array('/scene/index')),	
	array('label'=>'Update Device', 'url'=>array('update', 'id'=>$model->idtbl_scene_device)),
	array('label'=>'Delete Device', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idtbl_scene_device),'confirm'=>'Are you sure you want to delete this item?')),

);
?>

<h1>Device Details</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'idtbl_scene_device',
		//'tbl_scene_idtbl_scene',
		//'tbl_devices_idtbl_device',
            array(// related city displayed as a link
            'label' => 'Device',
            'type' => 'raw',
            'value' => CHtml::encode($model->tblDevicesIdtblDevice->tbl_device_name),
        ),
		'tbl_scene_device_level',
	),
)); ?>
