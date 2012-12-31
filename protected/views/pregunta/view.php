<?php
/* @var $this PreguntaController */
/* @var $model Pregunta */

$this->breadcrumbs=array(
	'Preguntas'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Pregunta', 'url'=>array('index')),
	array('label'=>'Create Pregunta', 'url'=>array('create')),
	array('label'=>'Update Pregunta', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Pregunta', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Pregunta', 'url'=>array('admin')),
);
?>

<h1>Pregunta "<?php echo $model->name; ?>"</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'description',
		'pregunta_id',
		'name',
		'tipo_id',
		'orden',
		'formulario_id',
	),
)); ?>
