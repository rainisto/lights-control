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
	array('label'=>'View Device', 'url'=>array('view', 'id'=>$model->idtbl_scene_device)),	
);
?>

<h1>Update Device</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>