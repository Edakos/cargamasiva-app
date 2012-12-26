<?php
/* @var $this ArchivoController */
/* @var $model Archivo */

$this->breadcrumbs=array(
	'Archivos'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Archivo', 'url'=>array('index')),
	array('label'=>'Create Archivo', 'url'=>array('create')),
	array('label'=>'View Archivo', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Archivo', 'url'=>array('admin')),
);
?>

<h1>Update Archivo <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>