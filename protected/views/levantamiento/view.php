<?php
/* @var $this LevantamientoController */
/* @var $model Levantamiento */

$this->breadcrumbs=array(
	'Levantamientos'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Levantamiento', 'url'=>array('index')),
	array('label'=>'Create Levantamiento', 'url'=>array('create')),
	array('label'=>'Update Levantamiento', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Levantamiento', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Levantamiento', 'url'=>array('admin')),
);
?>

<h1>View Levantamiento #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'description',
		'created',
		'modified',
		'created_by',
		'modified_by',
	),
)); ?>
