<?php
/* @var $this CargaController */
/* @var $model Carga */

$this->breadcrumbs=array(
	'Cargas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Carga', 'url'=>array('index')),
	array('label'=>'Manage Carga', 'url'=>array('admin')),
);
?>

<h1>Create Carga</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>