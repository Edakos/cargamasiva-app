<?php
/* @var $this ParametroController */
/* @var $model Parametro */

$this->breadcrumbs=array(
	'Parametros'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Parametro', 'url'=>array('index')),
	array('label'=>'Create Parametro', 'url'=>array('create')),
	array('label'=>'Update Parametro', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Parametro', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Parametro', 'url'=>array('admin')),
);
?>

<h1>View Parametro #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'valor',
		'texto',
		'numero',
		'fecha',
		'created',
		'modified',
		'created_by',
		'modified_by',
	),
)); ?>
