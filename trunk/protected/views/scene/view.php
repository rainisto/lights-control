<?php
/* @var $this SceneController */
/* @var $model Scene */

$this->breadcrumbs = array(
    'Scenes' => array('index'),
    $model->tbl_scene_title,
);

$this->menu = array(
    array('label' => 'List Scenes', 'url' => array('index')),
    array('label' => 'Create Scene', 'url' => array('create')),
    array('label' => 'Update Scene', 'url' => array('update', 'id' => $model->idtbl_scene)),
    array('label' => 'Delete Scene', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->idtbl_scene), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Add Device', 'url' => array('/sceneDevices/create', 'sceneId' => $model->idtbl_scene)),
);
?>

<h1><?php echo $model->tbl_scene_title?></h1>

<?php
$config = array('keyField' => 'idtbl_scene_device');
$dataProvider = new CArrayDataProvider($rawData = $model->sceneDevices, $config);

$this->widget('zii.widgets.grid.CGridView', array(
    //'id' => 'patients-grid',
    'dataProvider' => $dataProvider,
    'columns' => array(
        array(
            'header' => 'Device',
            'name' => 'tbl_devices_idtbl_device', //is it the foreign table column and not sortable
            'type' => 'raw',
            'value' => '$data->tblDevicesIdtblDevice->tbl_device_name',
        ),        
        array(
            'header' => 'Level',
            'name' => 'tbl_scene_device_level', //is it the foreign table column and not sortable
            'type' => 'raw',
            'value' => '$data->tbl_scene_device_level',
        ),
        array(
            'class' => 'CButtonColumn'
            , 'viewButtonUrl' => 'Yii::app()->createUrl("/sceneDevices/view", array("id"=>$data["idtbl_scene_device"]))'
            , 'updateButtonUrl' => 'Yii::app()->createUrl("/sceneDevices/update", array("id"=>$data["idtbl_scene_device"]))'
            , 'deleteButtonUrl' => 'Yii::app()->createUrl("/sceneDevices/delete", array("id"=>$data["idtbl_scene_device"]))'
        ),
    ),
));
?>