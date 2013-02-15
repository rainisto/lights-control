<?php
/* @var $this SceneController */
/* @var $model Scene */

$this->breadcrumbs=array(
	'Scenes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Scenes', 'url'=>array('index')),
);
?>

<h1>Create Scene</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>