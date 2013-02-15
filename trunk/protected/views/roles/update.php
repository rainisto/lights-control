<?php
/* @var $this RolesController */
/* @var $model Roles */

$this->breadcrumbs=array(
	'Roles'=>array('index'),
	$model->tbl_role_title=>array('view','id'=>$model->idtbl_role),
	'Update',
);

$this->menu=array(
	array('label'=>'List Roles', 'url'=>array('index')),
	array('label'=>'Create Role', 'url'=>array('create')),
	array('label'=>'View Role', 'url'=>array('view', 'id'=>$model->idtbl_role)),
);
?>

<h1>Update Role</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>