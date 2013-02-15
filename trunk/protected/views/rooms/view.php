<?php
/* @var $this RoomsController */
/* @var $model Rooms */

$this->breadcrumbs = array(
    'Rooms' => array('index'),
    $model->idtbl_room,
);

$this->menu = array(
    array('label' => 'List Rooms', 'url' => array('index')),
    array('label' => 'Create Room', 'url' => array('create')),
    array('label' => 'Update Room', 'url' => array('update', 'id' => $model->idtbl_room)),
    array('label' => 'Delete Room', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->idtbl_room), 'confirm' => 'Are you sure you want to delete this item?')),
);
?>

<h1>View Rooms #<?php echo $model->idtbl_room; ?></h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'idtbl_room',
        'tbl_room_name',
        //'tbl_floors_idtbl_floor',
        array(// related city displayed as a link
            'label' => 'Floor',
            'type' => 'raw',
            'value' => CHtml::encode($model->tblFloorsIdtblFloor->tbl_floor_name),
        ),
    ),
));
?>
