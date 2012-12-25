<?php
/* @var $this CargaController */
/* @var $model Carga */

$this->breadcrumbs=array(
	'Cargas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Carga', 'url'=>array('index')),
	array('label'=>'Create Carga', 'url'=>array('create')),
	array('label'=>'Update Carga', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Carga', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Carga', 'url'=>array('admin')),
);
?>

<h1>View Carga #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'archivo_id',
		'ies_id',
		'formulario_id',
		'created',
		'modified',
		'created_by',
		'modified_by',
	),
)); ?>
