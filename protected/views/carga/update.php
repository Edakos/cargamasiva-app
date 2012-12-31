<?php
/* @var $this CargaController */
/* @var $model Carga */

$this->breadcrumbs=array(
	'Cargas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Carga', 'url'=>array('index')),
	array('label'=>'Create Carga', 'url'=>array('create')),
	array('label'=>'View Carga', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Carga', 'url'=>array('admin')),
);
?>

<h1>Update Carga <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>