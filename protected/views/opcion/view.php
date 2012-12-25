<?php
/* @var $this OpcionController */
/* @var $model Opcion */

$this->breadcrumbs=array(
	'Opcions'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Opcion', 'url'=>array('index')),
	array('label'=>'Create Opcion', 'url'=>array('create')),
	array('label'=>'Update Opcion', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Opcion', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Opcion', 'url'=>array('admin')),
);
?>

<h1>View Opcion #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'descripcion',
		'pregunta_id',
		'created',
		'modified',
		'created_by',
		'modified_by',
	),
)); ?>
