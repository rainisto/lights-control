<?php
/* @var $this SceneDevicesController */
/* @var $model SceneDevices */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'scene-devices-form',
        'enableAjaxValidation' => false,
            ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <?php
    echo $form->labelEx($model, 'Room'); 
    
    $models = Rooms::model()->findAll(array('order' => 'tbl_room_name'));
    $list = CHtml::listData($models, 'idtbl_room', 'tbl_room_name');
    echo CHtml::dropDownList('room_id', null, array(""=>"Select Room")+$list, array(
        'ajax' => array(
            'type' => 'POST', //request type
            'url' => CController::createUrl('sceneDevices/getdevices'), 
            'update'=> '#'.CHtml::activeId($model, 'tbl_devices_idtbl_device'),   
            )));
    ?>

    <div class="row">	
    <?php
    if (isset($_GET["sceneId"]))
        $model->tbl_scene_idtbl_scene = $_GET["sceneId"];

    echo $form->hiddenField($model, 'tbl_scene_idtbl_scene');
    ?>
    </div>

    <div class="row">
       <?php echo $form->labelEx($model, 'tbl_devices_idtbl_device'); ?>
        <?php
            if(isset($_GET['id']))
                echo $form->dropDownList($model, 'tbl_devices_idtbl_device', CHtml::listData(Devices::model()->findAll(), 'idtbl_device', 'tbl_device_name'));
            else
                echo $form->dropDownList($model, 'tbl_devices_idtbl_device',array());
        ?>
        <?php echo $form->error($model, 'tbl_devices_idtbl_device'); ?>
    </div>

    <div class="row">
<?php echo $form->labelEx($model, 'tbl_scene_device_level'); ?>
<?php echo $form->textField($model, 'tbl_scene_device_level'); ?>
        <?php echo $form->error($model, 'tbl_scene_device_level'); ?>
    </div>

    <div class="row buttons">
<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

        <?php $this->endWidget(); ?>

</div><!-- form -->