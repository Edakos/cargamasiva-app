<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
//class Controller extends CController
class Controller extends RController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
    
    public function filterResetPassword($filterChain)
    {
        $filterChain->run();
    }
    
    protected function beforeAction($action) 
    {
        if (!Yii::app()->user->isGuest) {
            //echo '<pre>'; print_r(Yii::app()->user->id); echo '</pre>'; die();
            $usuario = Usuario::model()->findByPk(Yii::app()->user->id);
            //$reset_password = $usuario->reset_password;
            if ($usuario->reset_password && $action->getId() != 'clave') {
                $this->redirect('/usuario/clave?obligatorio');
                //echo '<pre>'; print_r($action); echo '</pre>'; die();
            }
        }
        return true;
    }
    
    protected function rutear() 
    {
        //$reset_password = false;

        
        $roles = array_keys(Rights::getAssignedRoles());
        //echo "<pre>"; print_r($permisos);echo "</pre>";die();
        if (in_array('admin', $roles)) {
            $this->redirect('/rights');
        } else if (in_array('supervisor', $roles)) {
            $this->redirect('/usuario');
        } else if (in_array('representante', $roles)) {
            $this->redirect('/site/index');
        } else {
            $this->redirect(Yii::app()->user->returnUrl);
        }
    }

}
