<?php
/* @var $this SceneController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Scenes',
);

$this->menu=array(
	array('label'=>'Create Scene', 'url'=>array('create')),
	array('label'=>'Manage Scenes', 'url'=>array('admin')),
);
?>

<h1>Scenes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
