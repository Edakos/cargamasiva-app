<?php

class CarreraController extends Controller
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
		$model=new Carrera;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Carrera']))
		{
			$model->attributes=$_POST['Carrera'];
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
		$model = $this->loadModel($id);

        
		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);
        
		if (isset($_POST['Carrera'])) {
            
			$model->attributes = $_POST['Carrera'];
			if ($model->save()) {
                print_r($_POST); die();
                if (isset($_POST['ajax'])) {
                    echo "OK";
                    Yii::app()->end();
                } else {
                    $this->redirect(array('view','id'=>$model->id));
                }
            }
		}
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
		$dataProvider=new CActiveDataProvider('Carrera');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Carrera('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Carrera']))
			$model->attributes=$_GET['Carrera'];

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
		$model=Carrera::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='carrera-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
    
    public function actionMostrar() 
    {
        $ies = Ies::model()->findByAttributes(array('code' => Yii::app()->user->name));
        $usuario = Usuario::model()->findByAttributes(array('username' => Yii::app()->user->name));
        
        /*
        $dataProvider = new CActiveDataProvider('Carrera', array(
            'criteria'=>array(
                'condition' => 'ies_id=:ies_id AND estado=:estado',
                'params'=>array(':ies_id'=>$ies->id, ':estado' =>'VIGENTE'),
                'order' => 'name, code',
            ),
            'pagination' => false,
        ));
        */
        
        $carreras_ies = Yii::app()->db->createCommand("
            SELECT
                code,
                name,
                to_char(fecha_creacion, 'DD/MM/YYYY') AS fecha_creacion,
                estado,
                ratificar_estado
            FROM
                carrera
            WHERE
                ies_id=:ies_id
                AND estado = :estado
            ORDER BY
                name, code
        ")->bindValues(array(
            ':ies_id' => $ies->id,
            ':estado' => 'VIGENTE',
        ))->queryAll();

        $this->layout = 'print';
        $html = $this->render('mostrar',array(
            //'data'=>$data,
            //'dataProvider'=>$dataProvider,
            'ies' => $ies,
            'carreras_ies' => $carreras_ies,
            'usuario' => $usuario,
        ), true);
        //echo $html;die();
        //$pdf = new WkHtmlToPdf();
        
        $pdf = new WkHtmlToPdf(array(
            //'no-outline',         // Make Chrome not complain
            //'margin-top'    => 30,
            //'margin-right'  => 0,
            //'margin-bottom' => 30,
            //'margin-left'   => 0,
            'encoding' => 'utf-8',
        ));
        //echo Yii::app()->basePath; die();
        $pdf->setPageOptions(array(
            //'disable-smart-shrinking',
            //'user-style-sheet' => Yii::app()->basePath . '/../public_html/css/print.css'
            //'user-style-sheet' => '/css/print.css'
            //'user-style-sheet' => Yii::app()->basePath . '/../public_html/css/pdf.css',
            //'header-left' => 'Secretaría Nacional de Eduación Superior, Ciencia, Tecnología e Innovación',
            //'header-html' => 'http://cargamasiva.senescyt.gob.ec/images/senescyt-logo.png',
            //'header-spacing' => '1',
            'footer-left' => 'Reporte de Carreras Vigentes',
            'footer-right' => 'Pag. [page] de [topage]',
            'footer-line',
            //'footer-spacing' => '1',
        ));
        // Add a HTML file, a HTML string or a page from a URL
        $pdf->addPage($html);
        
        //echo Yii::app()->basePath . '/../public_html/css/print.css'; die();

        // Add a cover (same sources as above are possible)
        //$pdf->addCover('mycover.pdf');

        // Add a Table of contents
        //$pdf->addToc();

        // Save the PDF
        //$pdf->saveAs('/tmp/new.pdf');

        // ... or send to client for inline display
        //$pdf->send();
        // ... or send to client as file download
        $pdf->send('reporte_carreras_vigentes.pdf');
        
        $ies->bloqueado_carreras = 1;
        $ies->save();
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
    
    public function actionRatificar()
    {
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
        $ies = Ies::model()->findByAttributes(array('code' => Yii::app()->user->name));
        
        if ($ies->bloqueado_carreras) {
            $this->redirect(array('actualizarResponsables'));
        }
        

		if (isset($_POST['Carrera'])) {
            //AJAX UPDATE:
            print_r($_POST['Carrera']);
                        
            $model = $this->loadModel($_POST['Carrera']['id']);
                print_r($model->attributes);

			$model->attributes = $_POST['Carrera'];
                print_r($model->attributes);

			if ($model->save()) {
				echo "OK-----\n";
                print_r($model->attributes);

            } else {
                echo "No se pudo guardar los datos";
            }
            Yii::app()->end();
		} else {
            //Carga de información a ser presentada:
            
            

            $total_sin_ratificar = Carrera::model()->count("
                ies_id = {$ies->id} 
                AND estado = 'VIGENTE'
                AND (
                    ratificar_estado IS NULL 
                    OR ratificar_estado = ''
                )
            ");
            
            $total_sin_fecha_creacion = Carrera::model()->count("
                ies_id = {$ies->id} 
                AND estado = 'VIGENTE'
                AND fecha_creacion IS NULL
            ");

            //$data = Carrera::model()->findAllBySql("SELECT c.* FROM carrera AS c, ies WHERE c.ies_id = ies.id AND ies.code='" . Yii::app()->user->name . "'", array(
                //':code' => Yii::app()->user->name
            //));
            
            $dataProvider = new CActiveDataProvider('Carrera', array(
                'criteria'=>array(
                    'condition' => 'ies_id=' . $ies->id . ' AND estado=' . "'VIGENTE'",
                    
                ),
                'pagination'=>array(
                    'pageSize'=>10,
                ),
            ));
            
            $this->layout = 'column1';
            $this->render('ratificar',array(
                //'data'=>$data,
                'dataProvider'=>$dataProvider,
                'total_sin_ratificar' => $total_sin_ratificar,
                'total_sin_fecha_creacion' => $total_sin_fecha_creacion,
                'ies' => $ies,
            ));
        }
    }
}
