<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->tbl_user_login=>array('view','id'=>$model->idtbl_user),
	'Update',
);

$this->menu=array(
	array('label'=>'List Users', 'url'=>array('index')),
	array('label'=>'Create Users', 'url'=>array('create')),
	array('label'=>'View Users', 'url'=>array('view', 'id'=>$model->idtbl_user)),
);
?>

<h1>Update User</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>