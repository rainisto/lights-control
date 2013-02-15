<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs = array(
    'Users' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Users', 'url' => array('index')),
    array('label' => 'Create Users', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('users-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Users</h1>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'users-grid',
    'dataProvider' => $model->search(),
    //'filter'=>$model,
    'columns' => array(
        //'idtbl_user',
        'tbl_user_login',
        //'tbl_user_password',
        'tbl_user_email',                      
         array(
            'header' => 'Role',
            'name' => 'tbl_roles_idtbl_role', //is it the foreign table column and not sortable
            'type' => 'raw',
            'value' => '$data->tblRolesIdtblRole->tbl_role_title',
        ),
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>
