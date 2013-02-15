<?php
/* @var $this FloorsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Floors',
);

$this->menu=array(
	array('label'=>'Create Floors', 'url'=>array('create')),
	array('label'=>'Manage Floors', 'url'=>array('admin')),
);
?>

<h1>Floors</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
