<?php
/* @var $this FloorsController */
/* @var $model Floors */

$this->breadcrumbs=array(
	'Floors'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Floors', 'url'=>array('index')),
	array('label'=>'Create Floor', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('floors-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Floors</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'floors-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		//'idtbl_floor',
		'tbl_floor_name',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
