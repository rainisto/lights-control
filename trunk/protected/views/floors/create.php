<?php
/* @var $this FloorsController */
/* @var $model Floors */

$this->breadcrumbs=array(
	'Floors'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Floors', 'url'=>array('index')),
	array('label'=>'Manage Floors', 'url'=>array('admin')),
);
?>

<h1>Create Floors</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>