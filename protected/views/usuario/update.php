<?php
/* @var $this UsuarioController */
/* @var $model Usuario */

$this->breadcrumbs=array(
	'Usuarios' => array('admin'),
	$model->username => array('view', 'id'=>$model->id),
	'Modificar usuario',
);


$this->menu=array(
	array('label'=>'<< Lista', 'url'=>array('admin')),
    array('label'=>'< Detalles', 'url'=>array('view', 'id'=>$model->id)),
    array('label'=>'Borrar Usuario', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>Yii::t('app', 'Are you sure you want to delete this item?'))),
);

?>

<h1>Modificar Usuario "<?php echo $model->username; ?>"</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
