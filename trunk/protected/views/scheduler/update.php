<?php
/* @var $this SchedulerController */
/* @var $model Scheduler */

$this->breadcrumbs=array(
	'Schedulers'=>array('index'),
	$model->idtbl_schedule=>array('view','id'=>$model->idtbl_schedule),
	'Update',
);

$this->menu=array(
	array('label'=>'List Scheduler', 'url'=>array('index')),
	array('label'=>'Create Scheduler', 'url'=>array('create')),
	array('label'=>'View Scheduler', 'url'=>array('view', 'id'=>$model->idtbl_schedule)),
	array('label'=>'Manage Scheduler', 'url'=>array('admin')),
);
?>

<h1>Update Scheduler <?php echo $model->idtbl_schedule; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>