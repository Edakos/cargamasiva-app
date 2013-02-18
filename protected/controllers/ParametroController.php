<?php

class ParametroController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';


	public function filters()
	{
		return array(
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
		$model=new Parametro;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Parametro']))
		{
			$model->attributes=$_POST['Parametro'];
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

		if(isset($_POST['Parametro']))
		{
			$model->attributes=$_POST['Parametro'];
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
		$dataProvider=new CActiveDataProvider('Parametro');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Parametro('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Parametro']))
			$model->attributes=$_GET['Parametro'];

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
		$model=Parametro::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='parametro-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
    
    
	public function actionBloquear()
	{
        
        
        /*
        $lista_ies = Yii::app()->db->createCommand("
            SELECT
                 id
                ,name
                ,code
                ,bloqueado_carga_pdf
                ,bloqueado_carga_matriz
            FROM 
                ies
            ORDER BY
                code
        ")->queryAll();
*/
	
		if (isset($_POST['Parametro'])) {
            $parametro = $this->loadModel($_POST['Parametro']['id']);
			$parametro->attributes = $_POST['Parametro'];
            
			if ($parametro->save()) {
				//$this->redirect(array('view', 'id' => $model->id));
                if ($parametro->id == 2) {
                    Ies::model()->updateAll(array('bloqueado_carga_matriz' => $parametro->valor));
                } else if ($parametro->id == 3) {
                    Ies::model()->updateAll(array('bloqueado_carga_pdf' => $parametro->valor));
                }
            }
		}

		if (isset($_POST['Ies'])) {
            
            $ies = Ies::model()->findByPk($_POST['Ies']['id']);
			$ies->attributes = $_POST['Ies'];
            //echo '<pre>'; print_r($_POST['Ies']); echo '</pre>'; 
            //echo '<pre>'; print_r($ies->attributes); echo '</pre>'; die();
			if ($ies->save()) {
                
				//$this->redirect(array('view', 'id' => $model->id));
            }
		}
        $lista_ies = Ies::model()->findAll(array('order' => 'code'));
		$bloquear_carga = $this->loadModel(1);
        $bloquear_carga_matriz = $this->loadModel(2);
        $bloquear_carga_pdf = $this->loadModel(3);


		$this->render('bloquear', array(
			'bloquear_carga' => $bloquear_carga,
            'bloquear_carga_matriz' => $bloquear_carga_matriz,
            'bloquear_carga_pdf' => $bloquear_carga_pdf,
            'lista_ies' => $lista_ies,
		));
	}


}
