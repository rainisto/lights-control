<?php

/**
 * This is the model class for table "tbl_scene".
 *
 * The followings are the available columns in table 'tbl_scene':
 * @property integer $idtbl_scene
 * @property string $tbl_scene_title
 *
 * The followings are the available model relations:
 * @property SceneDevices[] $sceneDevices
 * @property Scheduler[] $schedulers
 */
class Scene extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Scene the static model class
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
		return 'tbl_scene';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tbl_scene_title', 'required'),
			array('tbl_scene_title', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idtbl_scene, tbl_scene_title', 'safe', 'on'=>'search'),
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
			'sceneDevices' => array(self::HAS_MANY, 'SceneDevices', 'tbl_scene_idtbl_scene'),
			'schedulers' => array(self::HAS_MANY, 'Scheduler', 'tbl_scenes_idtbl_scene'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idtbl_scene' => 'Id',
			'tbl_scene_title' => 'Scene Title',
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

		$criteria->compare('idtbl_scene',$this->idtbl_scene);
		$criteria->compare('tbl_scene_title',$this->tbl_scene_title,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}