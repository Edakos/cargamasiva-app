<?php

/**
 * This is the model class for table "carga".
 *
 * The followings are the available columns in table 'carga':
 * @property integer $id
 * @property integer $archivo_id
 * @property integer $ies_id
 * @property integer $formulario_id
 * @property string $created
 * @property string $modified
 * @property integer $created_by
 * @property integer $modified_by
 *
 * The followings are the available model relations:
 * @property Respuesta[] $respuestas
 * @property Archivo $archivo
 * @property Formulario $formulario
 * @property Ies $ies
 */
class Carga extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Carga the static model class
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
		return 'carga';
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
			array('archivo_id, ies_id, formulario_id, created_by, modified_by', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, archivo_id, ies_id, formulario_id, created, modified, created_by, modified_by', 'safe', 'on'=>'search'),
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
			'respuestas' => array(self::HAS_MANY, 'Respuesta', 'carga_id'),
			'archivo' => array(self::BELONGS_TO, 'Archivo', 'archivo_id'),
			'formulario' => array(self::BELONGS_TO, 'Formulario', 'formulario_id'),
			'ies' => array(self::BELONGS_TO, 'Ies', 'ies_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'archivo_id' => 'Archivo',
			'ies_id' => 'Ies',
			'formulario_id' => 'Formulario',
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
		$criteria->compare('archivo_id',$this->archivo_id);
		$criteria->compare('ies_id',$this->ies_id);
		$criteria->compare('formulario_id',$this->formulario_id);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('modified',$this->modified,true);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('modified_by',$this->modified_by);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}