<?php

/**
 * This is the model class for table "tbl_scheduler".
 *
 * The followings are the available columns in table 'tbl_scheduler':
 * @property integer $idtbl_schedule
 * @property string $tbl_schedule_title
 * @property string $tbl_schedule_date
 * @property string $tbl_schedule_time_on
 * @property string $tbl_schedule_time_off
 * @property string $tbl_schedule_recurring
 * @property integer $tbl_scenes_idtbl_scene
 *
 * The followings are the available model relations:
 * @property Scene $tblScenesIdtblScene
 */
class Scheduler extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Scheduler the static model class
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
		return 'tbl_scheduler';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tbl_schedule_title, tbl_schedule_time_on, tbl_schedule_time_off, tbl_scenes_idtbl_scene', 'required'),
			array('tbl_scenes_idtbl_scene', 'numerical', 'integerOnly'=>true),
			array('tbl_schedule_title, tbl_schedule_recurring', 'length', 'max'=>45),
			array('tbl_schedule_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idtbl_schedule, tbl_schedule_title, tbl_schedule_date, tbl_schedule_time_on, tbl_schedule_time_off, tbl_schedule_recurring, tbl_scenes_idtbl_scene', 'safe', 'on'=>'search'),
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
			'tblScenesIdtblScene' => array(self::BELONGS_TO, 'Scene', 'tbl_scenes_idtbl_scene'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idtbl_schedule' => 'Id',
			'tbl_schedule_title' => 'Title',
			'tbl_schedule_date' => 'Date',
			'tbl_schedule_time_on' => 'Time On',
			'tbl_schedule_time_off' => 'Time Off',
			'tbl_schedule_recurring' => 'Recurring',
			'tbl_scenes_idtbl_scene' => 'Scene',
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

		$criteria->compare('idtbl_schedule',$this->idtbl_schedule);
		$criteria->compare('tbl_schedule_title',$this->tbl_schedule_title,true);
		$criteria->compare('tbl_schedule_date',$this->tbl_schedule_date,true);
		$criteria->compare('tbl_schedule_time_on',$this->tbl_schedule_time_on,true);
		$criteria->compare('tbl_schedule_time_off',$this->tbl_schedule_time_off,true);
		$criteria->compare('tbl_schedule_recurring',$this->tbl_schedule_recurring,true);
		$criteria->compare('tbl_scenes_idtbl_scene',$this->tbl_scenes_idtbl_scene);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}