<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class ResponsableForm extends MyFormModel
{
	public $cargo_elaborado_por;
    public $aprobado_por;
    public $cargo_aprobado_por;
    public $rector;
    public $ies = null;
    
    //public $password;
	//public $password_new;
	//public $password_new_repeat;

	//private $_identity;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
            array('cargo_elaborado_por, aprobado_por, cargo_aprobado_por, rector', 'required'),
            
			// username and password are required
			//array('password, password_new, password_new_repeat', 'required'),

            //array('password_new', 'compare'),
			// password needs to be authenticated
			//array('password', 'authenticate'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
        return array_merge(parent::attributeLabels(), array(
            'cargo_elaborado_por' => 'Su cargo',
            'aprobado_por' => 'Nombre de quien aprueba los datos ingresados',
            'cargo_aprobado_por' => 'Cargo de quien aprueba los datos ingresados',
            'rector' => 'Nombre del Rector de la Institución',
        )); 
	}
    
    
    public function init()
    {
        $this->ies = Ies::model()->findByAttributes(array('code' => Yii::app()->user->name));
        
        $this->cargo_elaborado_por = $this->ies->cargo_elaborado_por;
        $this->aprobado_por = $this->ies->aprobado_por;
        $this->cargo_aprobado_por = $this->ies->cargo_aprobado_por;
        $this->rector = $this->ies->rector;
    }

    
    public function save()
    {
        if (empty($this->ies)) {
            //$this->init();
             $this->ies = Ies::model()->findByAttributes(array('code' => Yii::app()->user->name));
        }
        
        if (!empty($this->ies) && !empty($this->aprobado_por) && !empty($this->rector)) {
            $this->ies->cargo_elaborado_por = $this->cargo_elaborado_por;
            $this->ies->aprobado_por = $this->aprobado_por;
            $this->ies->cargo_aprobado_por = $this->cargo_aprobado_por;
            $this->ies->rector = $this->rector;
            return $this->ies->save();
        }
            
        return false;
    }

/*    
    protected function afterValidate()
    {
        parent::afterValidate();
        $this->password = $this->encrypt($this->password);
    }
    
    public function encrypt($value)
    {
        return md5($value);
    }
*/
}

