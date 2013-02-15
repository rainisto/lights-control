<?php

/**
 * This is the model class for table "tbl_scene_devices".
 *
 * The followings are the available columns in table 'tbl_scene_devices':
 * @property integer $idtbl_scene_device
 * @property integer $tbl_scene_idtbl_scene
 * @property integer $tbl_devices_idtbl_device
 * @property integer $tbl_scene_device_level
 *
 * The followings are the available model relations:
 * @property Devices $tblDevicesIdtblDevice
 * @property Scene $tblSceneIdtblScene
 */
class SceneDevices extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SceneDevices the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_scene_devices';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tbl_devices_idtbl_device, tbl_scene_device_level', 'required'),
			array('idtbl_scene_device, tbl_scene_idtbl_scene, tbl_devices_idtbl_device, tbl_scene_device_level', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idtbl_scene_device, tbl_scene_idtbl_scene, tbl_devices_idtbl_device, tbl_scene_device_level', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'tblDevicesIdtblDevice' => array(self::BELONGS_TO, 'Devices', 'tbl_devices_idtbl_device'),
			'tblSceneIdtblScene' => array(self::BELONGS_TO, 'Scene', 'tbl_scene_idtbl_scene'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idtbl_scene_device' => 'Id',
			'tbl_scene_idtbl_scene' => 'Scene',
			'tbl_devices_idtbl_device' => 'Device',
			'tbl_scene_device_level' => 'Level',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idtbl_scene_device',$this->idtbl_scene_device);
		$criteria->compare('tbl_scene_idtbl_scene',$this->tbl_scene_idtbl_scene);
		$criteria->compare('tbl_devices_idtbl_device',$this->tbl_devices_idtbl_device);
		$criteria->compare('tbl_scene_device_level',$this->tbl_scene_device_level);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}