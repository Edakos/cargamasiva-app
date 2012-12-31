<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class UsuarioClaveForm extends MyFormModel
{
	public $password;
	public $password_new;
	public $password_new_repeat;

	private $_identity;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required
			array('password, password_new, password_new_repeat', 'required'),

            array('password_new', 'compare'),
			// password needs to be authenticated
			array('password', 'authenticate'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
        return array_merge(parent::attributeLabels(), array(
        )); 
	}

	/**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	 */
	public function authenticate($attribute, $params)
	{
		if (!$this->hasErrors()) {
			$this->_identity = new UserIdentity(Yii::app()->user->name, $this->password);
			if (!$this->_identity->authenticate()) {
				$this->addError('password', Yii::t('app', 'Incorrect username or password.'));
            }
		}
	}

	/**
	 * Logs in the user using the given username and password in the model.
	 * @return boolean whether login is successful
	 */
	public function login()
	{
		if ($this->_identity === null) {
			$this->_identity = new UserIdentity($this->username, $this->password);
			$this->_identity->authenticate();
		}
        
		if ($this->_identity->errorCode === UserIdentity::ERROR_NONE) {
			$duration = $this->rememberMe ? 3600*24*30 : 0; // 30 days
			Yii::app()->user->login($this->_identity, $duration);
            
            Usuario::model()->updateByPk(
                $this->_identity->id, 
                array('last_login_time' => new CDbExpression('NOW()'))
            );
            
			return true;
		} else {
			return false;
        }
	}
    
    public function save()
    {
        if ($this->password_new == $this->password_new_repeat) {
            $usuario = Usuario::model()->findByPk(Yii::app()->user->id);
            
            if ($usuario->encrypt($this->password) == $usuario->password) {
                $usuario->password = $this->password_new;
                $usuario->password_repeat = $this->password_new_repeat;
                $usuario->reset_password = false;
                
                if ($usuario->save()) {
                    return true;
                } else {
                    foreach($usuario->errors as $error => $message) {
                        $this->addError('password_new', $message);
                    }
                    print_r($usuario->errors);
                }
                
            } else {
                $this->addError('password', 'La contraseña actual no es correcta.');
            }
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

