<?php

/**
 * This is the model class for table "tbl_rooms".
 *
 * The followings are the available columns in table 'tbl_rooms':
 * @property integer $idtbl_room
 * @property string $tbl_room_name
 * @property integer $tbl_floors_idtbl_floor
 *
 * The followings are the available model relations:
 * @property Devices[] $devices
 * @property Floors $tblFloorsIdtblFloor
 */
class Rooms extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Rooms the static model class
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
		return 'tbl_rooms';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tbl_room_name, tbl_floors_idtbl_floor', 'required'),
			array('tbl_floors_idtbl_floor', 'numerical', 'integerOnly'=>true),
			array('tbl_room_name', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idtbl_room, tbl_room_name, tbl_floors_idtbl_floor', 'safe', 'on'=>'search'),
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
			'devices' => array(self::HAS_MANY, 'Devices', 'tbl_rooms_idtbl_room'),
			'tblFloorsIdtblFloor' => array(self::BELONGS_TO, 'Floors', 'tbl_floors_idtbl_floor'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idtbl_room' => 'Id',
			'tbl_room_name' => 'Room Name',
			'tbl_floors_idtbl_floor' => 'Floor',
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

		$criteria->compare('idtbl_room',$this->idtbl_room);
		$criteria->compare('tbl_room_name',$this->tbl_room_name,true);
		$criteria->compare('tbl_floors_idtbl_floor',$this->tbl_floors_idtbl_floor);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}