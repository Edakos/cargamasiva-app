<?php
/* @var $this ProvinciaController */
/* @var $model Provincia */

$this->breadcrumbs=array(
	'Provincias'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Provincia', 'url'=>array('index')),
	array('label'=>'Create Provincia', 'url'=>array('create')),
	array('label'=>'Update Provincia', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Provincia', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Provincia', 'url'=>array('admin')),
);
?>

<h1>View Provincia #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'code',
		'name',
		'created',
		'modified',
		'created_by',
		'modified_by',
	),
)); ?>
