<?php
/* @var $this CantonController */
/* @var $model Canton */

$this->breadcrumbs=array(
	'Cantons'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Canton', 'url'=>array('index')),
	array('label'=>'Create Canton', 'url'=>array('create')),
	array('label'=>'Update Canton', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Canton', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Canton', 'url'=>array('admin')),
);
?>

<h1>View Canton #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'codigo',
		'name',
		'provincia_id',
		'created',
		'modified',
		'created_by',
		'modified_by',
	),
)); ?>
