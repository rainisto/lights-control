<?php
/* @var $this FloorsController */
/* @var $model Floors */

$this->breadcrumbs=array(
	'Floors'=>array('index'),
	$model->idtbl_floor=>array('view','id'=>$model->idtbl_floor),
	'Update',
);

$this->menu=array(
	array('label'=>'List Floors', 'url'=>array('index')),
	array('label'=>'Create Floor', 'url'=>array('create')),
	array('label'=>'View Floor', 'url'=>array('view', 'id'=>$model->idtbl_floor)),
);
?>

<h1>Update Floors <?php echo $model->idtbl_floor; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>