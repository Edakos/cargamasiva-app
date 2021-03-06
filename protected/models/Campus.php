<?php

/**
 * This is the model class for table "campus".
 *
 * The followings are the available columns in table 'campus':
 * @property integer $id
 * @property string $created
 * @property string $modified
 * @property integer $created_by
 * @property integer $modified_by
 * @property integer $ies_id
 * @property string $code
 * @property integer $provincia_id
 * @property integer $canton_id
 * @property string $parroquia
 * @property string $direccion
 * @property string $abreviatura
 * @property string $tipo_sede
 * @property string $secuencial
 */
class Campus extends MyActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Campus the static model class
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
		return 'campus';
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
			array('created_by, modified_by, ies_id, provincia_id, canton_id', 'numerical', 'integerOnly'=>true),
			array('code, parroquia, direccion, abreviatura, tipo_sede, secuencial', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, created, modified, created_by, modified_by, ies_id, code, provincia_id, canton_id, parroquia, direccion, abreviatura, tipo_sede, secuencial', 'safe', 'on'=>'search'),
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
		$criteria->compare('created',$this->created,true);
		$criteria->compare('modified',$this->modified,true);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('modified_by',$this->modified_by);
		$criteria->compare('ies_id',$this->ies_id);
		$criteria->compare('code',$this->code,true);
		$criteria->compare('provincia_id',$this->provincia_id);
		$criteria->compare('canton_id',$this->canton_id);
		$criteria->compare('parroquia',$this->parroquia,true);
		$criteria->compare('direccion',$this->direccion,true);
		$criteria->compare('abreviatura',$this->abreviatura,true);
		$criteria->compare('tipo_sede',$this->tipo_sede,true);
		$criteria->compare('secuencial',$this->secuencial,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
