<?php

/**
 * This is the model class for table "ies".
 *
 * The followings are the available columns in table 'ies':
 * @property integer $id
 * @property string $code
 * @property string $name
 * @property string $notas
 * @property string $created
 * @property string $modified
 * @property integer $created_by
 * @property integer $modified_by
 *
 * The followings are the available model relations:
 * @property Carrera[] $carreras
 * @property Carga[] $cargas
 */
class Ies extends MyActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Ies the static model class
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
		return 'ies';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('created_by, modified_by', 'numerical', 'integerOnly'=>true),
			array('code', 'length', 'max'=>100),
			array('name', 'length', 'max'=>200),
			array('notas, created, modified, bloqueado_carga_pdf, bloqueado_carga_matriz, bloqueado_carreras, bloqueado_formulario', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, code, name, notas, created, modified, created_by, modified_by', 'safe', 'on'=>'search'),
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
			'carreras' => array(self::HAS_MANY, 'Carrera', 'ies_id'),
			'cargas' => array(self::HAS_MANY, 'Carga', 'ies_id'),
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
		$criteria->compare('code',$this->code,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('notas',$this->notas,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('modified',$this->modified,true);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('modified_by',$this->modified_by);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
    
    public function getEstructura()
    {
        $preguntas = Yii::app()->db->createCommand("
            SELECT 
                p.id
                ,p.name
                ,p.orden
                ,p.opcional
                ,p.pregunta_id AS padre
                ,p.tipo_id
                ,t.name AS tipo
                ,(
                    SELECT 
                        texto 
                    FROM 
                        respuesta AS r 
                    WHERE 
                            r.pregunta_id = p.id
                        AND r.ies_id = :ies_id
                ) AS respuesta
            FROM 
                pregunta AS p
                ,tipo AS t
                ,formulario AS f
                ,levantamiento as l
            WHERE
                    p.tipo_id = t.id
                AND p.formulario_id = f.id
                AND f.levantamiento_id = l.id
                AND f.name = :formulario
                AND l.code = :levantamiento
            ORDER BY
                p.orden
        ")->bindValues(array(
            ':ies_id' => $this->id,
            ':formulario' => 'IES',
            ':levantamiento' => '2012',
        ))->queryAll();

        
        //Armada de array con ID como referencia y busca opciones de ser el caso:
        $estructura = array();
        
        foreach ($preguntas as $p) {
            //process each item here
            $o = array();
            
            if ($p['tipo'] == 'Seleccion') {
                $opciones = Opcion::model()->findAllByAttributes(array(
                    'pregunta_id' => $p['id'],
                ));
                
                foreach ($opciones as $opcion) {
                    $o[$opcion->id] = $opcion->name;
                }
            }
            
            $estructura[$p['id']] = array(
                'id' => $p['id'],
                'texto' => $p['name'],
                'tipo' => $p['tipo'],
                'opcional' => $p['opcional'],
                'cuenta' => array(),
                'respuesta' => $p['respuesta'],
                'opciones' => $o,
                'padre' => $p['padre'], 
                'hijos' => array(),
            );
        }
        
        //Hijos en sus padres:
        $referencia = $estructura;
        
        foreach ($referencia as $id => $r) {
            if (!empty($r['padre'])) {
                $estructura[$r['padre']]['hijos'][$id] = & $estructura[$id];
            }
        }
        
        //eliminación de primer nivel que no son padres:
        
        foreach ($referencia as $id => $r) {
            if (!empty($r['padre'])) {
                unset($estructura[$id]);
            }
        }
        
        //agregar contadores:
        foreach ($estructura as & $e) {
            $e['cuenta'] = $this->contar($e['hijos']);
        }
        
        return $estructura;
    }
    
    //Cuenta las preguntas no opcionales existentes, y cuenta de ellas las que están respondidas:
    
    public function contar($data, $cuenta = array('total' => 0, 'respondidas' => 0))
    {
        foreach ($data as $k => $v) {
            if (!empty($v['tipo']) && !in_array($v['tipo'], array('Tabla', 'Seccion')) && empty($v['hijos']) && !$v['opcional']) {
                //es un campo de llenar:
                $cuenta['total'] += 1;
                //evalua si está respondida o no
                if ($v['respuesta'] !== null && $v['respuesta'] !== '') {
                    $cuenta['respondidas'] += 1;
                }
                //agrega el campo a la lista de campos por validar:
                
            }
            $cuenta = $this->contar($v['hijos'], $cuenta);
        }
        return $cuenta;
    }
}
