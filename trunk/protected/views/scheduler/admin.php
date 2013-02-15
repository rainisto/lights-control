<?php
/* @var $this SchedulerController */
/* @var $model Scheduler */

$this->breadcrumbs = array(
    'Schedulers' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Scheduler', 'url' => array('index')),
    array('label' => 'Create Scheduler', 'url' => array('create')),
);
?>

<h1>Scheduled Events</h1>


<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'scheduler-grid',
    'dataProvider' => $model->search(),
    //'filter'=>$model,
    'columns' => array(
        //'idtbl_schedule',
        'tbl_schedule_title',
        'tbl_schedule_date',
        'tbl_schedule_time_on',
        'tbl_schedule_time_off',
        //'tbl_schedule_recurring',
        array(
            'header' => 'Recurring',
            'name' => 'tbl_schedule_recurring', //is it the foreign table column and not sortable
            'type' => 'raw',
            'value' => '$data->tbl_schedule_recurring',
            ),
        array(
            'header' => 'Scene',
            'name' => 'tbl_scenes_idtbl_scene', //is it the foreign table column and not sortable
            'type' => 'raw',
            'value' => '$data->tblScenesIdtblScene->tbl_scene_title',
        ),
        /*
          'tbl_scenes_idtbl_scene',
         */
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>
