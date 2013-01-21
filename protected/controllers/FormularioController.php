<?php

class FormularioController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
    
    public $campos = array();
    
    public $_count = 0;
    
    public $soloLectura = false;

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'postOnly + delete', // we only allow deletion via POST request
            'rights',
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
        $model = $this->loadModel($id);
        
        $preguntaDataProvider=new CActiveDataProvider(
            'Pregunta', 
            array(
                'criteria'=>array(
                    'condition'=>'formulario_id=:formularioId',
                    'params'=>array(':formularioId'=>$id),
                ),
                'pagination'=>array(
                    'pageSize'=>10,
                ),
            )
        );
        
        $this->render('view',array(
            'model'=>$model,
            'preguntaDataProvider'=>$preguntaDataProvider,
        ));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Formulario;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Formulario']))
		{
			$model->attributes=$_POST['Formulario'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Formulario']))
		{
			$model->attributes=$_POST['Formulario'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Formulario');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Formulario('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Formulario']))
			$model->attributes=$_GET['Formulario'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Formulario::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='formulario-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
    
    public function actionActualizarResponsables() 
    {
        $ies = Ies::model()->findByAttributes(array('code' => Yii::app()->user->name));
        $usuario = Usuario::model()->findByAttributes(array('username' => Yii::app()->user->name));
        
        $formModel = new ResponsableForm();
        
        if (isset ($_POST['ResponsableForm'])) {
            $formModel->attributes = $_POST['ResponsableForm'];
            
            if ($formModel->validate()) {
                if ($formModel->save()) {
                    $this->redirect(array('mostrar'));
                }
            }
        }

        //$this->layout = 'column1';
		$this->render('actualizar_responsables', array(
			'model' => $formModel,
            'ies' => $ies,
            'usuario' => $usuario,
		));
    }
    
    public function actionLlenar()
    {
        $ies = Ies::model()->findByAttributes(array('code' => Yii::app()->user->name));
        
        if ($ies->bloqueado_formulario) {
            $this->redirect(array('actualizarResponsables'));
        }
        
        if(isset($_POST['Formulario'])) {
            //echo "<pre>";print_r($_POST['Formulario']);echo "</pre>";die();
            
            foreach($_POST['Formulario'] as $k => $v) {
                
                $respuesta = Respuesta::model()->findByAttributes(array(
                    'ies_id' => $ies->id,
                    'pregunta_id'=> $k,
                ));
                
                if (empty ($respuesta)) {
                    $respuesta = new Respuesta();
                    $respuesta->ies_id = $ies->id;
                    $respuesta->pregunta_id = $k;
                }
                
                $respuesta->texto = $v;
                
                $respuesta->save();
            }
            
            $destino = 'llenar';
            
            if (isset($_POST['seccion']) && isset($_POST['secciones'])) {
                $seccion = $_POST['seccion'];
                
                if (isset($_POST['Guardar'])) {
                    $destino .= '?seccion=' . $seccion;
                } else {
                    $secciones = explode(', ', $_POST['secciones']);
                    //echo "<pre>";print_r($_POST['secciones']);echo "</pre>";die();
                    
                    if ($seccion != end($secciones)) {
                        
                        $tomar_sig_seccion = false;
                        $sig_seccion = null;
                        
                        //echo "<pre>";print_r(implode(', ',$secciones));echo "</pre>";die();
                        
                        foreach ($secciones as $s) {
                            if ($tomar_sig_seccion) {
                                $sig_seccion = $s;
                                $tomar_sig_seccion = false;
                            }
                            if ($s == $seccion) {
                                $tomar_sig_seccion = true;
                            }
                        }
                        
                        if (!empty($sig_seccion)) {
                            $destino .= '?seccion=' . $sig_seccion;
                        }
                    }
                }
            }
                
            $this->redirect($destino);
        } else {
            $estructura = $ies->getEstructura();
            
            //echo "<pre>";print_r($estructura);echo "</pre>";die();
            //echo "<pre>";print_r($this->campos);echo "</pre>";die();

            $this->layout = 'column2_formulario';
            $this->render('llenar', array(
                'estructura' => $estructura,
                'ies' => $ies,
                //'campos' => $this->campos,
            ));
        }
    }
    
    public function generarForm($data, $solo_lectura = false)
    {
        if (empty($data)) {
            return;
        } else {
            $r = '';
            $r .= '<ol>';
            foreach ($data as $k => $v) {
                $r .= '<li>';
                //$r .= $v['texto'] . ' (' . $v['tipo'] . ')';
                $r .= $v['texto'];
                switch ($v['tipo']) {
                    case 'Tabla':
                        $r .= $this->generarTabla($v['hijos'], $solo_lectura);
                        break;
                    case 'Entero':
                        $r .= $this->generar($v, $k, $solo_lectura);
                        $r .= $this->generarForm($v['hijos'], $solo_lectura);
                        break;
                    case 'Texto':
                        $r .= $this->generar($v, $k, $solo_lectura);
                        $r .= $this->generarForm($v['hijos'], $solo_lectura);
                        break;
                    case 'Seccion':
                        $r .= $this->generarForm($v['hijos'], $solo_lectura);
                        break;
                    default:
                        $r .= $this->generar($v, $k, $solo_lectura);
                        $r .= $this->generarForm($v['hijos'], $solo_lectura);
                        break;
                }
                
                if (!$solo_lectura && in_array($v['tipo'], array('Tabla', 'Seccion'))) {
                    if ($this->_count > 10) {
                        $r .= '<input name="Guardar" type="submit" value="Guardar"/>';
                        $this->_count = 0;
                    }
                }
                
                $r .= '</li>';
            }
            $r .= '</ol>';
            return $r;
        }
    }
    
    private function generarTabla($data, $solo_lectura = false)
    {
        $tabla = '';
        $tabla .= '<div class="nobreak">';
        $tabla .= '<table style="background-color:#FFF;">';
        
        $primero = array_shift(array_values($data));
        if (!empty($primero['hijos'])) {
            //multinivel
            $segundo = array_shift(array_values($primero['hijos']));
            if (!empty($segundo['hijos'])) {
                //tres niveles
                $cabecera = array();
                $subcabecera = array();

                foreach ($data as $d) {
                    foreach ($d['hijos'] as $d2) {
                        if (!in_array($d2['texto'], $cabecera)) {
                            $cabecera[] = $d2['texto'];
                        }
                        foreach ($d2['hijos'] as $d3) {
                            if (!in_array($d3['texto'], $subcabecera)) {
                                $subcabecera[] = $d3['texto'];
                            }
                        }
                    }
                }
                
                $tabla .= '<tr>';
                $tabla .= '<th>&nbsp;</th>';
                foreach ($cabecera as $c) {
                    $tabla .= '<th colspan="' . count($subcabecera) . '">' . $c . '</th>';
                }
                $tabla .= '</tr>';

                $tabla .= '<tr>';
                $tabla .= '<th>&nbsp;</th>';
                foreach ($cabecera as $c) {
                    foreach ($subcabecera as $sc) {
                        $tabla .= '<th>' . $sc . '</th>';
                    }
                }
                $tabla .= '</tr>';

                
                foreach ($data as $d) {
                    $tabla .= '<tr>';
                    $tabla .= '<th>' . $d['texto'] . '</th>';
                    
                    foreach ($d['hijos'] as $d2) {
                        foreach ($d2['hijos'] as $d3) {
                            //$tabla .= '<td>' . '<input>' . '</td>';
                            $tabla .= '<td>' . $this->generar($d3, $solo_lectura) . '</td>';
                        }
                    }
                    
                    $tabla .= '</tr>';
                }
            } else {
                //dos niveles
                $cabecera = array();

                foreach ($data as $d) {
                    foreach ($d['hijos'] as $d2) {
                        if (!in_array($d2['texto'], $cabecera)) {
                            $cabecera[] = $d2['texto'];
                        }
                    }
                }
                
                $tabla .= '<tr>';
                $tabla .= '<th>&nbsp;</th>';
                foreach ($cabecera as $c) {
                    $tabla .= '<th>' . $c . '</th>';
                }
                $tabla .= '</tr>';
                
                foreach ($data as $d) {
                    $tabla .= '<tr>';
                    $tabla .= '<th>' . $d['texto'] . '</th>';
                    
                    foreach ($d['hijos'] as $d2) {
                        $tabla .= '<td>' . $this->generar($d2, $solo_lectura) . '</td>';
                    }
                    $tabla .= '</tr>';
                }
            }
        } else {
            //un nivel
            $cabecera = '';
            $detalle = '';
            foreach ($data as $d) {
                $cabecera .= '<th>' . $d['texto'] . '</th>';
                $detalle .= '<td>' . $this->generar($d, $solo_lectura) . '</td>';
            }
            $tabla .= '<tr>' . $cabecera . '</tr>';
            $tabla .= '<tr>' . $detalle . '</tr>';
        }
        
        
        $tabla .= '</table>';
        $tabla .= '</div>';
        
        return $tabla;
    }

    private function generar($pregunta, $solo_lectura = false)
    {
        $this->_count ++; // para saber cuándo poner un boton de Guardar
        
        $r = '';
        $id = 'f' . $pregunta['id'];
        $name = 'Formulario[' . $pregunta['id'] . ']';
        $title = $pregunta['texto'];
        
        if ($solo_lectura) {
            $r .= $pregunta['respuesta'] . '&nbsp;';
            $r .= '<div>&nbsp;</div>';
        } else {
            switch($pregunta['tipo']) {
                case 'Texto':
                    $r .= '<input  id="' . $id . '" name="' . $name . '" title="' . $title . '" value="' . $pregunta['respuesta'] . '">';
                    $r .= '<div>&nbsp;</div>';
                    break;
                case 'Fecha':
                    $r .= '<input id="' . $id . '" name="' . $name . '" title="' . $title . '" value="' . $pregunta['respuesta'] . '">';
                    $r .= '<div>&nbsp;</div>';
                    $this->registrarValidacion($id, 'date');
                    break;
                case 'Cedula':
                    $r .= '<input id="' . $id . '" name="' . $name . '" title="' . $title . '" value="' . $pregunta['respuesta'] . '">';
                    $r .= '<div>&nbsp;</div>';
                    $this->registrarValidacion($id, 'cedula');
                    break;
                case 'Email':
                    $r .= '<input id="' . $id . '" name="' . $name . '" title="' . $title . '" value="' . $pregunta['respuesta'] . '">';
                    $r .= '<div>&nbsp;</div>';
                    $this->registrarValidacion($id, 'email');
                    break;
                case 'Entero':
                    $r .= '<input id="' . $id . '" name="' . $name . '" title="' . $title . '" value="' . $pregunta['respuesta'] . '" size="10">';
                    $r .= '<div>&nbsp;</div>';
                    $this->registrarValidacion($id, 'integer');
                    break;
                case 'Decimal':
                    $r .= '<input id="' . $id . '" name="' . $name . '" title="' . $title . '" value="' . $pregunta['respuesta'] . '" size="10">';
                    $r .= '<div>&nbsp;</div>';
                    $this->registrarValidacion($id, 'number');
                    break;
                case 'SiNo':
                    $r .= '<div>';
                    $checked = ( $pregunta['respuesta'] !== null && $pregunta['respuesta']) ? 'checked' : '';
                    $r .= '<input type="radio" value="1" name="' . $name . '" ' . $checked . ' /> Sí ';
                    $r .= '<br/>';
                    $checked = ( $pregunta['respuesta'] !== null && !$pregunta['respuesta']) ? 'checked' : '';
                    $r .= '<input type="radio" value="0" name="' . $name . '" ' . $checked . '/> No';
                    $r .= '</div>';
                    break;
                case 'Seleccion':
                    $r .= '<select id="' . $id . '" name="' . $name . '" title="' . $title . '" >';
                    $r .= '<option></option>';
                    foreach ($pregunta['opciones'] as $opcion) {
                        $selected = ($opcion == $pregunta['respuesta']) ? 'selected' : '';
                        $r .= '<option value="' . $opcion . '" ' . $selected . '>' . $opcion . '</option>';
                    }
                    $r .= '</select>';
                    $r .= '<div>&nbsp;</div>';
                    break;
            }
        }
        return $r;
    }
    
    public function registrarValidacion($name, $tipo) 
    {
        //echo "<div>$name: $tipo</div>";
        $this->campos[$name] = $tipo;
    }

/*    
    public function contar($data, $cuenta = array('total' => 0, 'respondidas' => 0))
    {
        foreach ($data as $k => $v) {
            if (!empty($v['tipo']) && !in_array($v['tipo'], array('Tabla', 'Seccion')) && empty($v['hijos'])) {
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
*/

    /*
    protected function getEstructura($ies_id = null)
    {
        if (empty($ies_id)) {
            $ies_id = Ies::model()->findByAttributes(array('code' => Yii::app()->user->name))->id;
        }
        
        $preguntas = Yii::app()->db->createCommand("
            SELECT 
                p.id
                ,p.name
                ,p.orden
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
            ':ies_id' => $ies_id,
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
    */

/*    
    public function actionGenerarPdf()
    {
        require_once(Yii::app()->basePath . '');
    }
*/

    public function actionMostrar()
    {
        //echo 111; die();
        $ies = Ies::model()->findByAttributes(array('code' => Yii::app()->user->name));
        /*
        if (isset($_GET['ies']) && !empty($_GET['ies']) && is_numeric($_GET['ies'])) {
            $ies = Ies::model()->findByPk($_GET['ies']);
        } else {
            Yii::app()->end();
        }
        */
        
        $this->soloLectura = true;
        $estructura = $ies->getEstructura();
        $this->soloLectura = false;
        
        //$usuario = Usuario::model()->findByAttributes(array('username' => Yii::app()->user->name))->name;
        $usuario = Usuario::model()->findByAttributes(array('username' => $ies->code));
        
        $this->layout = 'print';
        $html = $this->render('mostrar', array(
            'estructura' => $estructura,
            'ies' => $ies,
            'usuario' => $usuario,
        ), true); 
        //echo $html;
        //$pdf = new WkHtmlToPdf();
        
        $pdf = new WkHtmlToPdf(array(
            //'no-outline',         // Make Chrome not complain
            //'margin-top'    => 20,
            //'margin-right'  => 20,
            //'margin-bottom' => 20,
            //'margin-left'   => 20,
            'encoding' => 'utf-8',
        ));
        //echo Yii::app()->basePath; die();
        $pdf->setPageOptions(array(
            //'disable-smart-shrinking',
            //'user-style-sheet' => 'pdf.css',
            //'user-style-sheet' => Yii::app()->basePath . '/../public_html/css/pdf.css',
            'footer-left' => 'Formulario Institucional',
            'footer-right' => 'Pag. [page] de [topage]',
            'footer-line',
        ));
        // Add a HTML file, a HTML string or a page from a URL
        $pdf->addPage($html);

        // Add a cover (same sources as above are possible)
        //$pdf->addCover('mycover.pdf');

        // Add a Table of contents
        //$pdf->addToc();

        // Save the PDF
        //$pdf->saveAs('/tmp/new.pdf');

        // ... or send to client for inline display
        //$pdf->send();
        // ... or send to client as file download
        $pdf->send('formulario_institucional.pdf');
        $ies->bloqueado_formulario = 1;
        $ies->save();
    }
}
