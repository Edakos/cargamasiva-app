<?php

class PreguntaController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
    
    private $_formulario = null;
    
    /**
    * Returns the formulario model instance to which this pregunta belongs
    */
    public function getFormulario()
    {
        return $this->_formulario;
    }

    protected function loadFormulario($formulario_id) 
    {    
        if ($this->_formulario === null) {
            $this->_formulario = Formulario::model()->findbyPk($formulario_id);
            
            if($this->_formulario === null) {
                throw new CHttpException(404,'El formulario solicitado no existe.');
            }
        }
        return $this->_formulario;
    }
    
    /**
    * In-class defined filter method, configured for use in the above
    filters() method
    * It is called before the actionCreate() action method is run in
    order to ensure a proper project context
    */
    public function filterFormularioContext($filterChain)
    {
        //set the project identifier based on either the GET or POST input
        //request variables, since we allow both types for our actions
        $formularioId = null;
        
        if(isset($_GET['formulario_id'])) {
            $formularioId = $_GET['formulario_id'];
        } else if(isset($_POST['formulario_id'])) {
            $formularioId = $_POST['formulario_id'];
        }
            
        $this->loadFormulario($formularioId);
        //complete the running of other filters and execute the requested action
        $filterChain->run();
    }

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
            'formularioContext + create', //check to ensure valid formulario context
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
				'actions'=>array('create','update'),
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
		$model = new Pregunta;
        $model->formulario_id = $this->_formulario->id;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['Pregunta'])) {
			$model->attributes = $_POST['Pregunta'];
			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id));
            }
		}
        
        $tipos = CActiveRecord::model('Tipo')->findAll();
        $tipos = !empty($tipos) ? $tipos : array();
        $tipos = CHtml::listData($tipos, 'id', 'name');

        $preguntas = CActiveRecord::model('Pregunta')->findAllByAttributes(array('formulario_id' => $this->_formulario->id));
        $preguntas = !empty($preguntas) ? $preguntas : array();
        $preguntas = CHtml::listData($preguntas, 'id', 'name');
        //$preguntas = array_flip($preguntas);
        //$preguntas = array_merge(array(''=>'-'), $preguntas );
        
		$this->render('create', array(
			'model' => $model,
            'formularioName' => $this->_formulario->name,
            //'tipos' => CHtml::listData($this->tipos, 'id', 'name'),
            'tipos' => $tipos,
            'preguntas' => $preguntas,
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

		if(isset($_POST['Pregunta']))
		{
			$model->attributes=$_POST['Pregunta'];
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
		$dataProvider=new CActiveDataProvider('Pregunta');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Pregunta('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Pregunta']))
			$model->attributes=$_GET['Pregunta'];

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
		$model=Pregunta::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='pregunta-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
