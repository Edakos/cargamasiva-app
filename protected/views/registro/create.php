<?php
/* @var $this RegistroController */
/* @var $model Registro */

$this->breadcrumbs=array(
	'Registros'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Registro', 'url'=>array('index')),
	array('label'=>'Manage Registro', 'url'=>array('admin')),
);
?>

<h1>Create Registro</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>