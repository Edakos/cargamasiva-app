<?php

/**
 * This is the model class for table "parametro".
 *
 * The followings are the available columns in table 'parametro':
 * @property integer $id
 * @property string $name
 * @property string $valor
 * @property string $texto
 * @property string $numero
 * @property string $fecha
 * @property string $created
 * @property string $modified
 * @property integer $created_by
 * @property integer $modified_by
 */
class Parametro extends MyActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Parametro the static model class
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
		return 'parametro';
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
			array('created_by, modified_by', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>128),
			array('valor, texto, numero, fecha', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, valor, texto, numero, fecha, created, modified, created_by, modified_by', 'safe', 'on'=>'search'),
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

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('valor',$this->valor,true);
		$criteria->compare('texto',$this->texto,true);
		$criteria->compare('numero',$this->numero,true);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('modified',$this->modified,true);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('modified_by',$this->modified_by);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
