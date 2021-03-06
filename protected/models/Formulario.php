<?php

/**
 * This is the model class for table "formulario".
 *
 * The followings are the available columns in table 'formulario':
 * @property integer $id
 * @property string $name
 * @property string $year
 * @property string $description
 * @property string $created
 * @property string $modified
 * @property integer $created_by
 * @property integer $modified_by
 * @property integer $levantamiento_id
 *
 * The followings are the available model relations:
 * @property Pregunta[] $preguntas
 * @property Levantamiento $levantamiento
 * @property Carga[] $cargas
 */
class Formulario extends MyActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Formulario the static model class
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
		return 'formulario';
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
			array('created_by, modified_by, levantamiento_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>100),
			array('year', 'length', 'max'=>16),
			array('description', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, year, description, created, modified, created_by, modified_by, levantamiento_id', 'safe', 'on'=>'search'),
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
			'preguntas' => array(self::HAS_MANY, 'Pregunta', 'formulario_id'),
			'levantamiento' => array(self::BELONGS_TO, 'Levantamiento', 'levantamiento_id'),
			'cargas' => array(self::HAS_MANY, 'Carga', 'formulario_id'),
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
		$criteria->compare('year',$this->year,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('modified',$this->modified,true);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('modified_by',$this->modified_by);
		$criteria->compare('levantamiento_id',$this->levantamiento_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
