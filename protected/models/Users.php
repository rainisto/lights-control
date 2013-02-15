<?php

/**
 * This is the model class for table "tbl_users".
 *
 * The followings are the available columns in table 'tbl_users':
 * @property integer $idtbl_user
 * @property string $tbl_user_login
 * @property string $tbl_user_password
 * @property string $tbl_user_email
 * @property integer $tbl_user_notifications
 * @property integer $tbl_roles_idtbl_role
 *
 * The followings are the available model relations:
 * @property Roles $tblRolesIdtblRole
 */
class Users extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Users the static model class
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
		return 'tbl_users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tbl_user_login, tbl_user_password, tbl_user_email, tbl_roles_idtbl_role', 'required'),
			array('tbl_user_notifications, tbl_roles_idtbl_role', 'numerical', 'integerOnly'=>true),
			array('tbl_user_login', 'length', 'max'=>45),
			array('tbl_user_password', 'length', 'max'=>128),
			array('tbl_user_email', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idtbl_user, tbl_user_login, tbl_user_password, tbl_user_email, tbl_user_notifications, tbl_roles_idtbl_role', 'safe', 'on'=>'search'),
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
			'tblRolesIdtblRole' => array(self::BELONGS_TO, 'Roles', 'tbl_roles_idtbl_role'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idtbl_user' => 'Id',
			'tbl_user_login' => 'Login',
			'tbl_user_password' => 'Password',
			'tbl_user_email' => 'Email',
			'tbl_user_notifications' => 'Receive Notifications',
			'tbl_roles_idtbl_role' => 'Role',
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

		$criteria->compare('idtbl_user',$this->idtbl_user);
		$criteria->compare('tbl_user_login',$this->tbl_user_login,true);
		$criteria->compare('tbl_user_password',$this->tbl_user_password,true);
		$criteria->compare('tbl_user_email',$this->tbl_user_email,true);
		$criteria->compare('tbl_user_notifications',$this->tbl_user_notifications);
		$criteria->compare('tbl_roles_idtbl_role',$this->tbl_roles_idtbl_role);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}