<?php
/* @var $this IesController */
/* @var $model Ies */

$this->breadcrumbs=array(
	'Ies'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Ies', 'url'=>array('index')),
	array('label'=>'Create Ies', 'url'=>array('create')),
	array('label'=>'Update Ies', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Ies', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Ies', 'url'=>array('admin')),
);
?>

<h1>View Ies #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'codigo',
		'name',
		'notas',
		'created',
		'modified',
		'created_by',
		'modified_by',
	),
)); ?>
