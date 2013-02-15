<?php
/* @var $this SceneController */
/* @var $model Scene */

$this->breadcrumbs = array(
    'Scenes' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Scenes', 'url' => array('index')),
    array('label' => 'Create Scene', 'url' => array('create')),
);
?>

<h1>Manage Scenes</h1>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'scene-grid',
    'dataProvider' => $model->search(),
    //'filter'=>$model,
    'columns' => array(
        //'idtbl_scene',
        'tbl_scene_title',
        array(
            'class' => 'CLinkColumn',
            'label' => 'OFF',
            'urlExpression' => 'Yii::app()->createUrl("scene/command",array("id"=>$data->idtbl_scene, "state"=>"0"));',
            'header' => ''
        ),
        array(
            'class' => 'CLinkColumn',
            'label' => 'ON',
            'urlExpression' => 'Yii::app()->createUrl("scene/command",array("id"=>$data->idtbl_scene, "state"=>"100"));',
            'header' => ''
        ),
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>
