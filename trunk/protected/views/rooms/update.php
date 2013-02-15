<?php
/* @var $this RoomsController */
/* @var $model Rooms */

$this->breadcrumbs=array(
	'Rooms'=>array('index'),
	$model->idtbl_room=>array('view','id'=>$model->idtbl_room),
	'Update',
);

$this->menu=array(
	array('label'=>'List Rooms', 'url'=>array('index')),
	array('label'=>'Create Room', 'url'=>array('create')),
	array('label'=>'View Room', 'url'=>array('view', 'id'=>$model->idtbl_room)),
);
?>

<h1>Update Rooms <?php echo $model->idtbl_room; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>