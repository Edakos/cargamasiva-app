<?php

/**
 * This is the model class for table "pais".
 *
 * The followings are the available columns in table 'pais':
 * @property string $created
 * @property string $modified
 * @property integer $created_by
 * @property integer $modified_by
 * @property integer $id
 * @property string $name
 * @property integer $secuencial
 * @property string $codigo_iso
 * @property string $nacionalidad
 */
class Pais extends MyActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Pais the static model class
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
		return 'pais';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('created, modified', 'required'),
			array('created_by, modified_by, secuencial', 'numerical', 'integerOnly'=>true),
			array('name, codigo_iso, nacionalidad', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('created, modified, created_by, modified_by, id, name, secuencial, codigo_iso, nacionalidad', 'safe', 'on'=>'search'),
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

		$criteria->compare('created',$this->created,true);
		$criteria->compare('modified',$this->modified,true);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('modified_by',$this->modified_by);
		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('secuencial',$this->secuencial);
		$criteria->compare('codigo_iso',$this->codigo_iso,true);
		$criteria->compare('nacionalidad',$this->nacionalidad,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
