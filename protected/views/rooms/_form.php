<?php
/* @var $this RoomsController */
/* @var $model Rooms */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'rooms-form',
        'enableAjaxValidation' => false,
            ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

        <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'tbl_room_name'); ?>
<?php echo $form->textField($model, 'tbl_room_name', array('size' => 45, 'maxlength' => 45)); ?>
<?php echo $form->error($model, 'tbl_room_name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'tbl_floors_idtbl_floor'); ?>
        <?php
        $models = Floors::model()->findAll(array('order' => 'tbl_floor_name'));
        $list = CHtml::listData($models, 'idtbl_floor', 'tbl_floor_name');
        echo CHtml::dropDownList('Rooms[tbl_floors_idtbl_floor]', $model->tblFloorsIdtblFloor, $list);
        ?>
<?php echo $form->error($model, 'tbl_floors_idtbl_floor'); ?>
    </div>

    <div class="row buttons">
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->