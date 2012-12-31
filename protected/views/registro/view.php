<?php
/* @var $this RegistroController */
/* @var $model Registro */

$this->breadcrumbs=array(
	'Registros'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Registro', 'url'=>array('index')),
	array('label'=>'Create Registro', 'url'=>array('create')),
	array('label'=>'Update Registro', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Registro', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Registro', 'url'=>array('admin')),
);
?>

<h1>View Registro #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'contexto',
		'description',
		'creado',
		'created',
		'modified',
		'created_by',
		'modified_by',
	),
)); ?>
