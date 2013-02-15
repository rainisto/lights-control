<?php

/**
 * This is the model class for table "tbl_devices".
 *
 * The followings are the available columns in table 'tbl_devices':
 * @property integer $idtbl_device
 * @property string $tbl_device_name
 * @property integer $tbl_device_nodeid
 * @property string $tbl_device_type
 * @property integer $tbl_rooms_idtbl_room
 *
 * The followings are the available model relations:
 * @property Rooms $tblRoomsIdtblRoom
 * @property SceneDevices[] $sceneDevices
 */
class Devices extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Devices the static model class
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
		return 'tbl_devices';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tbl_device_name, tbl_device_nodeid, tbl_rooms_idtbl_room', 'required'),
			array('tbl_device_nodeid, tbl_rooms_idtbl_room', 'numerical', 'integerOnly'=>true),
			array('tbl_device_name, tbl_device_type', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idtbl_device, tbl_device_name, tbl_device_nodeid, tbl_device_type, tbl_rooms_idtbl_room', 'safe', 'on'=>'search'),
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
			'tblRoomsIdtblRoom' => array(self::BELONGS_TO, 'Rooms', 'tbl_rooms_idtbl_room'),
			'sceneDevices' => array(self::HAS_MANY, 'SceneDevices', 'tbl_devices_idtbl_device'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idtbl_device' => 'Id',
			'tbl_device_name' => 'Device Name',
			'tbl_device_nodeid' => 'Node ID',
			'tbl_device_type' => 'Device Type',
			'tbl_rooms_idtbl_room' => 'Room',
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

		$criteria->compare('idtbl_device',$this->idtbl_device);
		$criteria->compare('tbl_device_name',$this->tbl_device_name,true);
		$criteria->compare('tbl_device_nodeid',$this->tbl_device_nodeid);
		$criteria->compare('tbl_device_type',$this->tbl_device_type,true);
		$criteria->compare('tbl_rooms_idtbl_room',$this->tbl_rooms_idtbl_room);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}