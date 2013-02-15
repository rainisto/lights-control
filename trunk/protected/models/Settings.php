<?php

/**
 * This is the model class for table "tbl_settings".
 *
 * The followings are the available columns in table 'tbl_settings':
 * @property integer $idtbl_settings
 * @property string $tbl_settings_latitute_deg
 * @property string $tbl_settings_latitude_dir
 * @property string $tbl_settings_longitude_deg
 * @property string $tbl_settings_longitude_dir
 * @property string $tbl_settings_UUID
 *
 * The followings are the available model relations:
 * @property Floors[] $floors
 */
class Settings extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Settings the static model class
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
		return 'tbl_settings';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tbl_settings_latitute_deg, tbl_settings_latitude_dir, tbl_settings_longitude_deg, tbl_settings_longitude_dir', 'required'),
			array('tbl_settings_latitute_deg, tbl_settings_longitude_deg', 'length', 'max'=>10),
			array('tbl_settings_latitude_dir, tbl_settings_longitude_dir', 'length', 'max'=>1),
			array('tbl_settings_UUID', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idtbl_settings, tbl_settings_latitute_deg, tbl_settings_latitude_dir, tbl_settings_longitude_deg, tbl_settings_longitude_dir, tbl_settings_UUID', 'safe', 'on'=>'search'),
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
			'floors' => array(self::HAS_MANY, 'Floors', 'tbl_home_idtbl_home'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idtbl_settings' => 'Idtbl Settings',
			'tbl_settings_latitute_deg' => 'Tbl Settings Latitute Deg',
			'tbl_settings_latitude_dir' => 'Tbl Settings Latitude Dir',
			'tbl_settings_longitude_deg' => 'Tbl Settings Longitude Deg',
			'tbl_settings_longitude_dir' => 'Tbl Settings Longitude Dir',
			'tbl_settings_UUID' => 'Tbl Settings Uuid',
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

		$criteria->compare('idtbl_settings',$this->idtbl_settings);
		$criteria->compare('tbl_settings_latitute_deg',$this->tbl_settings_latitute_deg,true);
		$criteria->compare('tbl_settings_latitude_dir',$this->tbl_settings_latitude_dir,true);
		$criteria->compare('tbl_settings_longitude_deg',$this->tbl_settings_longitude_deg,true);
		$criteria->compare('tbl_settings_longitude_dir',$this->tbl_settings_longitude_dir,true);
		$criteria->compare('tbl_settings_UUID',$this->tbl_settings_UUID,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}