<?php
/* @var $this RoomsController */
/* @var $model Rooms */

$this->breadcrumbs = array(
    'Rooms' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Rooms', 'url' => array('index')),
    array('label' => 'Create Room', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('rooms-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Rooms</h1>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'rooms-grid',
    'dataProvider' => $model->search(),
    //'filter'=>$model,
    'columns' => array(
        //'idtbl_room',
        'tbl_room_name',
       //'tbl_floors_idtbl_floor',
        array(
            'header' => 'Floor',
            'name' => 'tbl_floors_idtbl_floor', //is it the foreign table column and not sortable
            'type' => 'raw',
            'value' => '$data->tblFloorsIdtblFloor->tbl_floor_name',
        ),
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>
