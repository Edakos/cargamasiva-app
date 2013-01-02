<?php

class SiteController extends Controller
{
    public $defaultAction = 'login';
	/**
	 * Declares class-based actions.
	 */
     
	public function filters()
	{
		return array(
            'rights',
		);
	}
    
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
        $ies = Ies::model()->findByAttributes(array('code' => Yii::app()->user->name));
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
        $formDataProvider2012 = new CActiveDataProvider(
            'Formulario',
            array(
                'criteria' => array(
                    'condition'=>'levantamiento_id=:levantamientoId',
                    'params'=>array(':levantamientoId'=>'2'),
                )
            )
        );
        
        $formDataProvider2010 = new CActiveDataProvider(
            'Formulario',
            array(
                'criteria' => array(
                    'condition'=>'levantamiento_id=:levantamientoId',
                    'params'=>array(':levantamientoId'=>'1'),
                )
            )
        );
        
		$this->render('index', array(
            'dataProvider2012' => $formDataProvider2012,
            'dataProvider2010' => $formDataProvider2010,
            'ies' => $ies,
        ));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if (Yii::app()->request->isAjaxRequest) {
				echo $error['message'];
            } else if (Yii::app()->errorHandler->error['code'] == 403) {
                Yii::app()->user->setFlash('notice', Yii::app()->errorHandler->error['message']);
                $this->rutear(); 
			} else {
				$this->render('error', $error);
            }
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

        $rutear = false;
        
		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if ($model->validate() && $model->login()) {
                $this->rutear();
                
				//$this->redirect(Yii::app()->user->returnUrl);
            }
		} else if (!Yii::app()->user->isGuest) {
            $this->rutear();
        }
        
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}
