<?php
/* @var $this RegistroController */
/* @var $model Registro */

$this->breadcrumbs=array(
	'Registros'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Registro', 'url'=>array('index')),
	array('label'=>'Create Registro', 'url'=>array('create')),
	array('label'=>'View Registro', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Registro', 'url'=>array('admin')),
);
?>

<h1>Update Registro <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>