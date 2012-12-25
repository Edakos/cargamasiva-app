<?php
/* @var $this ConocimientoAreaController */
/* @var $model ConocimientoArea */

$this->breadcrumbs=array(
	'Conocimiento Areas'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List ConocimientoArea', 'url'=>array('index')),
	array('label'=>'Create ConocimientoArea', 'url'=>array('create')),
	array('label'=>'Update ConocimientoArea', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ConocimientoArea', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ConocimientoArea', 'url'=>array('admin')),
);
?>

<h1>View ConocimientoArea #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'codigo',
		'name',
		'descripcion',
		'created',
		'modified',
		'created_by',
		'modified_by',
	),
)); ?>
