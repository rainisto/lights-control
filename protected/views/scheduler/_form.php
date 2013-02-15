<?php
/* @var $this SchedulerController */
/* @var $model Scheduler */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
//    $form = $this->beginWidget('CActiveForm', array(
//        'id' => 'scheduler-form',
//        'enableAjaxValidation' => false,
//            ));
    ?>
    <?php 
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'scheduler-form',
    'type'=>'horizontal',
)); ?>
    

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'tbl_schedule_title'); ?>
        <?php echo $form->textField($model, 'tbl_schedule_title', array('size' => 45, 'maxlength' => 45)); ?>
        <?php echo $form->error($model, 'tbl_schedule_title'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'tbl_schedule_date'); ?>
        <?php
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'name' => 'tbl_schedule_date',
            'attribute' => 'tbl_schedule_date',
            //'id'=>'user_Birthdate',
            'model' => $model,
                // additional javascript options for the date picker plugin            
        ));
        ?>
        <?php echo $form->error($model, 'tbl_schedule_date'); ?>
    </div>

    <div class="row">        
        <?php echo $form->labelEx($model, 'tbl_schedule_time_on'); ?>
        <?php
        Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
        $this->widget('CJuiDateTimePicker', array(
            'model' => $model, //Model object
            'attribute' => 'tbl_schedule_time_on', //attribute name
            'mode' => 'time', //use "time","date" or "datetime" (default)
            'options' => array(), // jquery plugin options
        ));
        ?>
        <?php echo $form->error($model, 'tbl_schedule_time_on'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'tbl_schedule_time_off'); ?>
        <?php
        Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
        $this->widget('CJuiDateTimePicker', array(
            'model' => $model, //Model object
            'attribute' => 'tbl_schedule_time_off', //attribute name
            'mode' => 'time', //use "time","date" or "datetime" (default)
            'options' => array(), // jquery plugin options
        ));
        ?>
        <?php echo $form->error($model, 'tbl_schedule_time_off'); ?>
    </div>

    <div class="row"> 
        <?php echo $form->checkBoxListInlineRow($model, 'tbl_schedule_recurring', array('Sun'=>'Sun','Mon'=>'Mon', 'Tue'=>'Tue', 'Wed'=>'Wed', 'Thu'=>'Thu', 'Fri'=>'Fri', 'Sat'=>'Sat')); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'tbl_scenes_idtbl_scene'); ?>        
        <?php
        $models = Scene::model()->findAll(array('order' => 'tbl_scene_title'));
        $list = CHtml::listData($models, 'idtbl_scene', 'tbl_scene_title');
        echo CHtml::dropDownList('Scheduler[tbl_scenes_idtbl_scene]', $model->tbl_scenes_idtbl_scene, $list);
        ?>
        <?php echo $form->error($model, 'tbl_scenes_idtbl_scene'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->