<?php

/**
 * This is the model class for table "usuario".
 *
 * The followings are the available columns in table 'usuario':
 * @property integer $id
 * @property string $email
 * @property string $username
 * @property string $password
 * @property string $password_repeat
 * @property string $first_name
 * @property string $last_name
 * @property string $cedula
 * @property string $address
 * @property string $cellphone
 * @property string $birthday
 * @property string $last_login_time
 * @property string $created
 * @property string $modified
 * @property integer $created_by
 * @property integer $modified_by
 * @property boolean $deleted
 * @property boolean $disabled
 * @property boolean $reset_password
 * 
 */
class Usuario extends MyActiveRecord
{
    public $password_repeat;
    private $_password;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Usuario the static model class
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
		return 'usuario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username', 'required'),
            array('username, password', 'required', 'on' => 'insert'),
			array('created_by, modified_by', 'numerical', 'integerOnly'=>true),
			array('email, username, password, first_name, last_name, name, cedula, address, cellphone', 'length', 'max'=>256),
			array('birthday, password_repeat, deleted, disabled, reset_password', 'safe'),
            array('email, username, cedula', 'unique'),
            array('password', 'compare'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, email, username, password, first_name, last_name, cedula, address, cellphone, birthday, last_login_time, created, modified, created_by, modified_by, disabled, reset_password', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array_merge(parent::attributeLabels(), array(
            'name' => 'Nombre que aparecerá en los reportes PDF',
        ));
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

		$criteria->compare('id',$this->id);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('first_name',$this->name,true);
        $criteria->compare('last_name',$this->name,true);
		$criteria->compare('cedula',$this->cedula,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('cellphone',$this->cellphone,true);
		$criteria->compare('birthday',$this->birthday,true);
		$criteria->compare('last_login_time',$this->last_login_time,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('modified',$this->modified,true);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('modified_by',$this->modified_by);
        $criteria->compare('deleted',$this->deleted);
		$criteria->compare('disabled',$this->disabled);
        $criteria->compare('reset_password',$this->reset_password);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
    
    //protected function afterValidate()
    protected function beforeSave()
    {
        parent::beforeSave();
        if (!empty($this->password)) {
            $this->password = $this->encrypt($this->password);
            //echo "beforeSave: password=ecrypt(" . $this->password . ")";
        } else {
            $this->password = $this->_password;
            //echo "beforeSave: password=_password(" . $this->_password . ")";
        }
        
        
        if (empty($this->birthday)) {
            $this->birthday = null;
        }
        
        return true;
    }
    
    protected function afterSave()
    {
        $roles = array_keys(Rights::getAssignedRoles($this->id));
        //echo '<pre>'; print_r($roles); echo '</pre>'; die();
        if (empty($roles)) {
            Rights::assign('representante', $this->id);
        }
        return parent::afterSave();
    }
    
    public function encrypt($value)
    {
        return md5($value);
    }
    
    protected function afterFind() {
        parent::afterFind();
        $this->_password = $this->password;
        //echo "afterFind: this->_password=this->password: " . $this->_password;
        
        return true;
    }
}
