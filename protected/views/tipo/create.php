<?php
/* @var $this TipoController */
/* @var $model Tipo */

$this->breadcrumbs=array(
	'Tipos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Ver todos los Tipos', 'url'=>array('index')),
	//array('label'=>'Manage Tipo', 'url'=>array('admin')),
);
?>

<h1>Crear Nuevo Tipo</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
