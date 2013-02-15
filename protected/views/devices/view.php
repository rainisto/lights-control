<?php
/* @var $this DevicesController */
/* @var $model Devices */

$this->breadcrumbs = array(
    'Devices' => array('index'),
    $model->tbl_device_name,
);

$this->menu = array(
    array('label' => 'List Devices', 'url' => array('admin')),
    array('label' => 'Update Device', 'url' => array('update', 'id' => $model->idtbl_device)),
    array('label' => 'Delete Device', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->idtbl_device), 'confirm' => 'Are you sure you want to delete this item?')),    
);
?>

<h1>Device Details</h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        //'idtbl_device',
        'tbl_device_name',
        'tbl_device_nodeid',
        'tbl_device_type',
        array(// related city displayed as a link
            'label' => 'Room',
            'type' => 'raw',
            'value' => CHtml::encode($model->tblRoomsIdtblRoom->tbl_room_name)
        ),
    ),
));
?>
