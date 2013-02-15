<?php
/* @var $this FloorsController */
/* @var $model Floors */

$this->breadcrumbs=array(
	'Floors'=>array('index'),
	$model->idtbl_floor,
);

$this->menu=array(
	array('label'=>'List Floors', 'url'=>array('index')),
	array('label'=>'Create Floor', 'url'=>array('create')),
	array('label'=>'Update Floor', 'url'=>array('update', 'id'=>$model->idtbl_floor)),
	array('label'=>'Delete Floor', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idtbl_floor),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>View Floors #<?php echo $model->idtbl_floor; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idtbl_floor',
		'tbl_floor_name',
	),
)); ?>
