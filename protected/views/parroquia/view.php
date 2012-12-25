<?php
/* @var $this ParroquiaController */
/* @var $model Parroquia */

$this->breadcrumbs=array(
	'Parroquias'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Parroquia', 'url'=>array('index')),
	array('label'=>'Create Parroquia', 'url'=>array('create')),
	array('label'=>'Update Parroquia', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Parroquia', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Parroquia', 'url'=>array('admin')),
);
?>

<h1>View Parroquia #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'codigo',
		'name',
		'canton_id',
		'created',
		'modified',
		'created_by',
		'modified_by',
		'cabecera_cantonal',
		'capital_provincial',
		'cambio',
		'ojo',
	),
)); ?>
