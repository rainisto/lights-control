<?php
/* @var $this DevicesController */
/* @var $model Devices */

$this->breadcrumbs = array(
    'Devices' => array('index'),
    'List',
);

$this->menu = array(
    array('label' => 'List Devices', 'url' => array('index')),    
    array('label' => 'Import Devices', 'url' => array('import')),
    array('label' => 'Delete All Devices', 'url' => array('deleteAll'), 'linkOptions'=>array('confirm'=>'Are you sure want to delete all devices?')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('devices-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Devices</h1>
<?php
    foreach(Yii::app()->user->getFlashes() as $key => $message) {
        echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
    }
?>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'devices-grid',
    'dataProvider' => $model->search(),
    //'filter' => $model,
    'columns' => array(
        //'idtbl_device',
        'tbl_device_nodeid',
        'tbl_device_name',
        'tbl_device_type',
        array(
            'header' => 'Room',
            'name' => 'tbl_rooms_idtbl_room', //is it the foreign table column and not sortable
            'type' => 'raw',
            'value' => '$data->tblRoomsIdtblRoom->tbl_room_name',
        ),
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>
