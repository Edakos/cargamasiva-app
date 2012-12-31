<?php
/* @var $this ConocimientoSubareaController */
/* @var $model ConocimientoSubarea */

$this->breadcrumbs=array(
	'Conocimiento Subareas'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List ConocimientoSubarea', 'url'=>array('index')),
	array('label'=>'Create ConocimientoSubarea', 'url'=>array('create')),
	array('label'=>'Update ConocimientoSubarea', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ConocimientoSubarea', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ConocimientoSubarea', 'url'=>array('admin')),
);
?>

<h1>View ConocimientoSubarea #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'code',
		'name',
		'description',
		'conocimiento_area_id',
		'created',
		'modified',
		'created_by',
		'modified_by',
	),
)); ?>
