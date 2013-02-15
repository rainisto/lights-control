<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'users-form',
        'enableAjaxValidation' => false,
            ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'tbl_user_login'); ?>
        <?php echo $form->textField($model, 'tbl_user_login', array('size' => 45, 'maxlength' => 45)); ?>
        <?php echo $form->error($model, 'tbl_user_login'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'tbl_user_password'); ?>
        <?php echo $form->passwordField($model, 'tbl_user_password', array('size' => 60, 'maxlength' => 128)); ?>        
        <?php echo $form->error($model, 'tbl_user_password'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'tbl_user_email'); ?>
        <?php echo $form->textField($model, 'tbl_user_email', array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'tbl_user_email'); ?>
    </div> 

    <div class="row">
        <?php echo $form->labelEx($model, 'tbl_roles_idtbl_role'); ?>
        <?php
        $models = Roles::model()->findAll(array('order' => 'tbl_role_title'));
        $list = CHtml::listData($models, 'idtbl_role', 'tbl_role_title');
        echo CHtml::dropDownList('Users[tbl_roles_idtbl_role]', $model->tblRolesIdtblRole, $list);
        ?>
        <?php echo $form->error($model, 'tbl_roles_idtbl_role'); ?>
    </div>
    
     <div class="row">
        <?php echo $form->labelEx($model, 'tbl_user_notifications'); ?>
        <?php echo $form->checkBox($model, 'tbl_user_notifications', array('Yes', 'No')); ?>
        <?php echo $form->error($model, 'tbl_user_notifications'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->