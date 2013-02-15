<?php
/* @var $this DevicesController */
/* @var $model Devices */

$this->breadcrumbs = array(
    'Control',
);

?>
<h1>Control Devices</h1>
<?php
    foreach(Yii::app()->user->getFlashes() as $key => $message) {
        echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
    }
?>

<?php 
$status = $this->status;

$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'Devices',
    'dataProvider' => $model->search(),
    //'filter' => $model,
    'columns' => array(
        //'idtbl_device',
        array(
            'header' => 'State',
            'name' => 'image',
            'type' => 'html', //OffLamp240.png                        
            'value' => function($data, $row) use ($status) {
                if ($status[$data->tbl_device_nodeid] == 0) {
                    return CHtml::image(Yii::app()->assetManager->publish("images/OffLamp240.png"), "", array("style" => "width:25px;margin-left:40px;"));
                } else {
                    return CHtml::image(Yii::app()->assetManager->publish("images/OnLamp240.png"), "", array("style" => "width:25px;margin-left:40px;"));
                }
            }
        ),
        array(
            'header' => 'Level',
            'name' => 'level',
            'type' => 'raw', //OffLamp240.png                        
            'value' => function($data, $row) use ($status) {
                return $status[$data->tbl_device_nodeid];
            }
        ),
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
            'class' => 'CLinkColumn',
            'label' => 'OFF',            
            'urlExpression'=>'Yii::app()->createUrl("control/command",array("node"=>$data->tbl_device_nodeid, "type"=>$data->tbl_device_type , "level"=>"0"));',
            'header' => ''
        ),
        array(
            'class' => 'CLinkColumn',
            'label' => 'ON',
            'urlExpression'=>'Yii::app()->createUrl("control/command",array("node"=>$data->tbl_device_nodeid, "type"=>$data->tbl_device_type , "level"=>"100"));',
            'header' => ''
        ),        
    ),
));
?>