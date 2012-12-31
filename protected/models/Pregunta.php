<?php

/**
 * This is the model class for table "pregunta".
 *
 * The followings are the available columns in table 'pregunta':
 * @property integer $id
 * @property string $description
 * @property integer $pregunta_id
 * @property string $name
 * @property integer $tipo_id
 * @property integer $orden
 * @property string $created
 * @property string $modified
 * @property integer $created_by
 * @property integer $modified_by
 * @property integer $formulario_id
 *
 * The followings are the available model relations:
 * @property Respuesta[] $respuestas
 * @property Formulario $formulario
 * @property Pregunta $pregunta
 * @property Pregunta[] $preguntas
 * @property Tipo $tipo
 * @property Opcion[] $opcions
 */
class Pregunta extends MyActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Pregunta the static model class
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
		return 'pregunta';
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
			array('pregunta_id, tipo_id, orden, created_by, modified_by, formulario_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>128),
			array('description', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, description, pregunta_id, name, tipo_id, orden, created, modified, created_by, modified_by, formulario_id', 'safe', 'on'=>'search'),
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
			'respuestas' => array(self::HAS_MANY, 'Respuesta', 'pregunta_id'),
			'formulario' => array(self::BELONGS_TO, 'Formulario', 'formulario_id'),
			'pregunta' => array(self::BELONGS_TO, 'Pregunta', 'pregunta_id'),
			'preguntas' => array(self::HAS_MANY, 'Pregunta', 'pregunta_id'),
			'tipo' => array(self::BELONGS_TO, 'Tipo', 'tipo_id'),
			'opcions' => array(self::HAS_MANY, 'Opcion', 'pregunta_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
        return array_merge(parent::attributeLabels(), array(
            'pregunta_id' => 'Pregunta padre',
            'tipo_id' => 'Tipo',
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
		$criteria->compare('description',$this->description,true);
		$criteria->compare('pregunta_id',$this->pregunta_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('tipo_id',$this->tipo_id);
		$criteria->compare('orden',$this->orden);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('modified',$this->modified,true);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('modified_by',$this->modified_by);
		$criteria->compare('formulario_id',$this->formulario_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
