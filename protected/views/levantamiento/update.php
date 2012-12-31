<?php
/* @var $this LevantamientoController */
/* @var $model Levantamiento */

$this->breadcrumbs=array(
	'Levantamientos'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Levantamiento', 'url'=>array('index')),
	array('label'=>'Create Levantamiento', 'url'=>array('create')),
	array('label'=>'View Levantamiento', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Levantamiento', 'url'=>array('admin')),
);
?>

<h1>Update Levantamiento <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>