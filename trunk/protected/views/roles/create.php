<?php
/* @var $this RolesController */
/* @var $model Roles */

$this->breadcrumbs=array(
	'Roles'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Roles', 'url'=>array('index')),	
);
?>

<h1>Create Role</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>