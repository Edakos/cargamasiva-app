<?php

/**
 * This is the model class for table "respuesta".
 *
 * The followings are the available columns in table 'respuesta':
 * @property integer $id
 * @property string $texto
 * @property string $numero
 * @property integer $pregunta_id
 * @property string $descripcion
 * @property integer $carga_id
 * @property string $name
 * @property string $created
 * @property string $modified
 * @property integer $created_by
 * @property integer $modified_by
 *
 * The followings are the available model relations:
 * @property Pregunta $pregunta
 * @property Carga $carga
 */
class Respuesta extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Respuesta the static model class
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
		return 'respuesta';
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
			array('pregunta_id, carga_id, created_by, modified_by', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>128),
			array('texto, numero, descripcion', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, texto, numero, pregunta_id, descripcion, carga_id, name, created, modified, created_by, modified_by', 'safe', 'on'=>'search'),
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
			'pregunta' => array(self::BELONGS_TO, 'Pregunta', 'pregunta_id'),
			'carga' => array(self::BELONGS_TO, 'Carga', 'carga_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'texto' => 'Texto',
			'numero' => 'Numero',
			'pregunta_id' => 'Pregunta',
			'descripcion' => 'Descripcion',
			'carga_id' => 'Carga',
			'name' => 'Name',
			'created' => 'Created',
			'modified' => 'Modified',
			'created_by' => 'Created By',
			'modified_by' => 'Modified By',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('texto',$this->texto,true);
		$criteria->compare('numero',$this->numero,true);
		$criteria->compare('pregunta_id',$this->pregunta_id);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('carga_id',$this->carga_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('modified',$this->modified,true);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('modified_by',$this->modified_by);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}