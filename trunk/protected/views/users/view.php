<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs = array(
    'Users' => array('index'),
    $model->tbl_user_login,
);

$this->menu = array(
    array('label' => 'List Users', 'url' => array('index')),
    array('label' => 'Create Users', 'url' => array('create')),
    array('label' => 'Update Users', 'url' => array('update', 'id' => $model->idtbl_user)),
    array('label' => 'Delete Users', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->idtbl_user), 'confirm' => 'Are you sure you want to delete this item?')),
);
?>

<h1>User Details</h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        //'idtbl_user',
        'tbl_user_login',
        //'tbl_user_password',
        'tbl_user_email',
        //'tbl_user_notifications', 
        array(// related city displayed as a link
            'label' => 'Notifications',
            'type' => 'raw',
            'value' => CHtml::checkBox($model->tbl_user_notifications,$model->tbl_user_notifications,array("disabled"=>"disabled")),
        ),
        array(// related city displayed as a link
            'label' => 'Role',
            'type' => 'raw',
            'value' => CHtml::encode($model->tblRolesIdtblRole->tbl_role_title)
        ),
    ),
));
?>
