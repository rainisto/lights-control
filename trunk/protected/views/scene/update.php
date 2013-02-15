<?php
/* @var $this SceneController */
/* @var $model Scene */

$this->breadcrumbs=array(
	'Scenes'=>array('index'),
	$model->tbl_scene_title=>array('view','id'=>$model->idtbl_scene),
	'Update',
);

$this->menu=array(
	array('label'=>'List Scenes', 'url'=>array('index')),
	array('label'=>'Create Scene', 'url'=>array('create')),
	array('label'=>'View Scene', 'url'=>array('view', 'id'=>$model->idtbl_scene)),
);
?>

<h1>Update Scene</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>