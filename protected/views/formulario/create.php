<?php
/* @var $this FormularioController */
/* @var $model Formulario */

$this->breadcrumbs=array(
	'Formularios'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Formulario', 'url'=>array('index')),
	array('label'=>'Manage Formulario', 'url'=>array('admin')),
);
?>

<h1>Create Formulario</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>