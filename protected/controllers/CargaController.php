<?php

class CargaController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
            'rights',
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','realizar'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
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
                
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['Carga'])) {
            
			$model->attributes=$_POST['Carga'];
            $model->archivo = CUploadedFile::getInstance($model,'archivo');
            
            
            $es_nombre_valido = false;
            
            if ($model->archivo->extensionName == 'xlsx' 
                && count($formulario = Formulario::model()->findByAttributes(array(
                    'levantamiento_id' => 2,
                    'name' => str_replace('.xlsx', '', $model->archivo->name),
                )))) {
                //busca si es un formulario
                
                //echo "Es un formulario"; die();
                $es_nombre_valido = true;
                $model->formulario_id = $formulario->id;
                
            } else if ($model->archivo->extensionName == 'pdf' 
                && count($documento = Documento::model()->findByAttributes(array(
                    'levantamiento_id' => 2,
                    'name' => str_replace('.pdf', '', $model->archivo->name),
                )))) {
                //busca si es un documento
                
                //echo "Es un documento"; die();
                $es_nombre_valido = true;
                $model->documento_id = $documento->id;
                
            }
            
            if ($es_nombre_valido) {
                $ies = Ies::model()->findByAttributes(array('code' => Yii::app()->user->name));
                
                $name = '2012_' . $ies->code . '_' . $model->archivo->name;
                
                $path = Yii::app()->basePath . '/../public_html/archivos/' . $name;
                
                if (file_exists($path)) {
                    $new_path = Yii::app()->basePath . '/../public_html/archivos/' . str_replace('.' . $model->archivo->extensionName, '', $name) . '-' . time() . '-' . md5_file($path) . '.' . $model->archivo->extensionName;
                    copy($path, $new_path);
                }
                
                if ($model->archivo->saveAs($path)) {
                    if (count($archivo = Archivo::model()->findByattributes(array('name' => $name))) == 0) {
                        //si es válido el nombre, crea el archivo
                        $archivo = new Archivo();
                        $archivo->name = $name;
                        
                        $archivo->extension = $model->archivo->extensionName;
                    }
                    $archivo->md5 = md5_file($path);
                    
                    if ($archivo->save()) {
                        $model->archivo_id = $archivo->id;

                        $model->ies_id = $ies->id;  
                        
                        
                        if ($model->save()) {
                            //echo Yii::app()->basePath; die();
                            $this->redirect(array('/carga/realizar?success'));
                        }
                    }
                }
            }
            $this->redirect(array('/carga/realizar?error'));
		} 
        
        $formDataProvider2012 = new CActiveDataProvider(
            'Formulario',
            array(
                'criteria' => array(
                    'condition'=>'levantamiento_id=:levantamientoId and name<>:name',
                    'params'=>array(':levantamientoId'=>'2', ':name' =>'IES'),
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


        $this->layout = 'column1';
        $this->render('realizar', array(
            'formDataProvider2012' => $formDataProvider2012,
            'docDataProvider2012' => $docDataProvider2012,
            'model'=>$model,
            
        ));
    }
}
