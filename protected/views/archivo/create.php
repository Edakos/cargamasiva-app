<?php
/* @var $this ArchivoController */
/* @var $model Archivo */

$this->breadcrumbs=array(
	'Archivos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Archivo', 'url'=>array('index')),
	array('label'=>'Manage Archivo', 'url'=>array('admin')),
);
?>

<h1>Create Archivo</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>