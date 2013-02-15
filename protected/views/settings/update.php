<?php
/* @var $this SettingsController */
/* @var $model Settings */

$this->breadcrumbs=array(
	'Settings'=>array('index'),
	$model->idtbl_settings=>array('view','id'=>$model->idtbl_settings),
	'Update',
);

$this->menu=array(
	array('label'=>'List Settings', 'url'=>array('index')),
	array('label'=>'Create Settings', 'url'=>array('create')),
	array('label'=>'View Settings', 'url'=>array('view', 'id'=>$model->idtbl_settings)),
	array('label'=>'Manage Settings', 'url'=>array('admin')),
);
?>

<h1>Update Settings <?php echo $model->idtbl_settings; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>