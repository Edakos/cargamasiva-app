<?php

class CargaController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout = '//layouts/column2';
    public $model = null;
    public $errores_validacion = array();

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
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Carga;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Carga']))
		{
			$model->attributes=$_POST['Carga'];
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

		if(isset($_POST['Carga']))
		{
			$model->attributes=$_POST['Carga'];
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
		$dataProvider=new CActiveDataProvider('Carga');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Carga('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Carga']))
			$model->attributes=$_GET['Carga'];

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
		$model=Carga::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='carga-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
    
    public function actionRealizar() 
    {
		$model = new Carga;
        $error = '';
        $mensaje = '';
        $success = false;

                
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

        if (isset($_POST['Carga'])) {
            
			$model->attributes = $_POST['Carga'];
            
            //echo "<pre>";print_r($_POST['Carga']);echo "</pre>";die();


            $es_nombre_valido = false;
            
            
            if ($model->archivo_cargado = CUploadedFile::getInstance($model,'archivo_cargado')) {

                if ($model->archivo_cargado->extensionName == 'csv' 
                    && count($formulario = Formulario::model()->findByAttributes(array(
                        'levantamiento_id' => 2,
                        'name' => str_replace('.csv', '', $model->archivo_cargado->name),
                    )))) {
                    //busca si es un formulario
                    
                    //echo "Es un formulario"; die();
                    $es_nombre_valido = true;
                    $model->formulario_id = $formulario->id;
                    
                } else if ($model->archivo_cargado->extensionName == 'pdf' 
                    && count($documento = Documento::model()->findByAttributes(array(
                        'levantamiento_id' => 2,
                        'name' => str_replace('.pdf', '', $model->archivo_cargado->name),
                    )))) {
                    //busca si es un documento
                    
                    //echo "Es un documento"; die();
                    $es_nombre_valido = true;
                    $model->documento_id = $documento->id;
                    
                }
                
                if ($es_nombre_valido) {
                    $ies = Ies::model()->findByAttributes(array('code' => Yii::app()->user->name));
                    
                    $name = '2012_' . $ies->code . '_' . $model->archivo_cargado->name;
                    
                    $path = $this->getPath() . $name;
                    
                    if (file_exists($path)) {
                        $new_path = $this->getPath() . str_replace('.' . $model->archivo_cargado->extensionName, '', $name) . '-' . time() . '-' . md5_file($path) . '.' . $model->archivo_cargado->extensionName;
                        copy($path, $new_path);
                    }
                    
                    if ($model->archivo_cargado->saveAs($path)) {
                        if (count($archivo = Archivo::model()->findByattributes(array('name' => $name))) == 0) {
                            //si es válido el nombre, crea el archivo
                            $archivo = new Archivo();
                            $archivo->name = $name;
                            
                            $archivo->extension = $model->archivo_cargado->extensionName;
                        }
                        $archivo->md5 = md5_file($path);
                        
                        if ($archivo->save()) {
                            $model->archivo_id = $archivo->id;

                            $model->ies_id = $ies->id;  
                            $model->id = null;  
                            
                            //echo "<pre>";print_r($model);echo "</pre>";die();
                            //echo "<pre>";print_r($carga->getPrimaryKey());echo "</pre>";die();
                            
                            if ($model->save()) {
                                //echo Yii::app()->basePath; die();
                                if ($model->archivo_cargado->extensionName == 'csv') {
                                    //Se hace la validación a los archivos csv:
                                    $this->model = $model;
                                    if ($this->validar()) {
                                        //$this->redirect(array('/carga/realizar?success'));
                                        $success = true;
                                    } else {
                                        $model->delete();
                                        
                                        $mensaje = $this->errores_validacion;
                                        $error = 'validacion';
                                    }
                                } else {
                                    //$this->redirect(array('/carga/realizar?success'));
                                    $success = true;
                                }
                            } else {
                                //echo "<pre>";print_r($model->getErrors());echo "</pre>";die();
                                
                                $mensaje = $model->getErrors();
                                $error = 'carga_save';
                            }
                            
                        } else {
                            $mensaje = $archivo->getErrors();
                            $error = 'archivo_save';
                        }
                    } else {
                        $mensaje = 'El código del error es ' . $model->archivo_cargado->getError();
                        $error = 'sin_permisos';
                    }
                } else {
                    $error = 'nombre_invalido';
                }
            } else {
                $error = 'sin_archivo';
            }
            //$this->redirect(array('/carga/realizar?error=' . $error . '&mensaje=' . $mensaje));
		} 
        
        $formDataProvider2012 = new CActiveDataProvider(
            'Formulario',
            array(
                'criteria' => array(
                    'condition'=>'levantamiento_id=:levantamientoId and name<>:name',
                    'params'=>array(':levantamientoId'=>'2', ':name' =>'IES'),
                    'order'=>'orden',
                ),
                'pagination'=>array(
                    'pageSize'=>10,
                ),
            )
        );
        
        $docDataProvider2012 = new CActiveDataProvider(
            'Documento',
            array(
                'criteria' => array(
                    'condition'=>'levantamiento_id=:levantamientoId',
                    'params'=>array(':levantamientoId'=>'2'),
                ),
                'pagination'=>array(
                    'pageSize'=>50,
                ),
            )
        );
        
        $archivo_cargado = empty($model->archivo_cargado) ? '<i>Vacío</i>' : $model->archivo_cargado->name;


        $this->layout = 'column1';
        $this->render('realizar', array(
            'formDataProvider2012' => $formDataProvider2012,
            'docDataProvider2012' => $docDataProvider2012,
            'model'=>$model,
            'error' => $error,
            'mensaje' => $mensaje,
            'success' => $success,
            'archivo_cargado' => $archivo_cargado,
        ));
    }
    
    protected function validar() 
    {
        $c = $this->model;
        $errores = array();
        
        $fila = 0;
        $contador_vacios = 0;
        
        $formulario_name = array_shift(explode('.', $c->archivo_cargado->name));
        
        if (($gestor = fopen($this->getPath() . $c->archivo->name, "r")) !== FALSE) {
            
            
            
            //recorre las filas que no tienen datos:
            for ($i = 0; $i < 3; $i++) fgetcsv($gestor);
            
            //obtiene la fila con los títulos de las columnas:
            $columnas = fgetcsv($gestor);
            
            //las pasa a UTF8:
            foreach ($columnas as & $columna) {
                $columna = utf8_encode(trim($columna));
            }
            
            //echo "<pre>";print_r($columnas);echo "</pre>";
            
            
            $preguntas = Pregunta::model()->with('formulario')->findAllByAttributes(array(
                'name' => $formulario_name,
            ));
            
            $preguntas = Formulario::model()->findByAttributes(array('name' => $formulario_name))->preguntas;
            
            
            
            $p = array();
            $todos_constan = true;
            
            foreach ($preguntas as $pregunta) {
                $opciones = array();
                
                if ($pregunta->tipo->name == 'Seleccion') {
                    foreach ($pregunta->opcions as $opcion) {
                        if (!empty($opcion->fuente) && class_exists($clase = $opcion->fuente)) {
                            $fuentes = $clase::model()->findAll();
                            foreach ($fuentes as $fuente) {
                                $opciones[] = $fuente->name;
                            }
                        } else {
                            $opciones[] = $opcion->name;
                        }
                    }
                }
                
                $p[$pregunta->name] = array(
                    'tipo' => $pregunta->tipo->name,
                    'patron' => $pregunta->tipo->patron,
                    'mensaje' => $pregunta->tipo->mensaje,
                    'id' => $pregunta->id,
                    'opciones' => $opciones,
                );
                $todos_constan = $todos_constan ? in_array($pregunta->name, $columnas) : false;
                
/*  
                if (!in_array($pregunta->name, $columnas)) {
                    echo "<pre>";print_r($pregunta->name . ': ' . in_array($pregunta->name, $columnas));echo "</pre>";
                }
*/
                
            }
            //echo "<pre>";print_r($p);echo "</pre>";die();
            
            if ($todos_constan) {
                
                //echo "<pre>";print_r($p);echo "</pre>";
                
                $fila = 4;
                $demasiados_errores = false;
                while (($datos = fgetcsv($gestor, 10000, ",")) !== FALSE && $contador_vacios < 20 && !$demasiados_errores) {
                    
                    $fila++;
                    //$numero = count($datos);
                    if (count($datos) > 0 && trim(implode('',$datos)) != '') {
                        //echo "<pre>";print_r('[' . trim(implode('',$datos)) . ']');echo "</pre>";die();
                        
                        for ($c = 0; $c < count($datos); $c++) {
                            $datos[$c] = utf8_encode($datos[$c]);
                            
                            //echo $fila . "." . ($c + 1) . " " . $datos[$c] . ": " . $this->validarDato($datos[$c], $p[$columnas[$c]]) . "<br />\n";
                            if (!$this->validarDato($datos[$c], $p[$columnas[$c]])) {
                                $dato = filter_var($datos[$c], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                                $dato = strlen($dato) > 20 ? substr($dato, 0, 19) . '...' : $dato;
                                $letra_columna = ($c <= ord('Z') - ord('A')) ? chr(ord('A') + $c) : chr(ord('A') + floor($c / (ord('Z') - ord('A') + 1)) - 1) . chr(ord('A') + ($c % (ord('Z') - ord('A') + 1)));
                                //$errores[] = 'Error en la celda ' . $letra_columna . $fila . ': "' . $dato . '" no es un dato válido para la columna ' . $columnas[$c] . ' de tipo ' . $p[$columnas[$c]]['tipo'] . '.' ;
                                $errores[] = 'Error en la celda ' . $letra_columna . $fila . ': "' . $dato . '" no es un dato válido, ya que todo valor en la columna ' . str_replace('#{field}', $columnas[$c], $p[$columnas[$c]]['mensaje']);
                            }
                        }
                    } else {
                        $contador_vacios++;
                    }
                    $demasiados_errores = (count($errores) >= 10) ;
                    
                }
                
                if ($demasiados_errores) {
                    $errores[] = '<strong>El archivo tiene demasiados errores. Atienda las indicaciones anteriores y vuelva a intentar la carga del archivo.</strong>';
                }
            } else {
                //echo "Faltan columnas. Revise el archivo.";
                $errores[] = 'El archivo enviado no tiene las columnas esperadas. Por favor revise que disponga de la última versión del archivo <a href="/archivos/' . $formulario_name . '.xlsx">' . $formulario_name . '.xlsx</a>';
            }
            fclose($gestor);
        } else {
            $errores[] = 'No se puede validar el archivo cargado. Si el problema persiste por favor contáctese con el administrador del sistema.';
        }
        
        if (!empty($errores)) {
            $this->errores_validacion = $errores;
            //echo "<pre>";print_r($errores);echo "</pre>";die();
            
            return false;
        } 

        return true;
    }
    
    protected function getPath() 
    {
        return Yii::app()->basePath . '/../public_html/archivos/';
    }
    
    protected function validarDato($dato, $pregunta)
    {
        if ($pregunta['tipo'] == 'Seleccion') {
            return in_array($dato, $pregunta['opciones']);
        }
        return preg_match($pregunta['patron'], $dato);
    }
}
