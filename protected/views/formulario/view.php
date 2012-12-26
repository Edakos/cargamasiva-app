<?php
/* @var $this FormularioController */
/* @var $model Formulario */

$this->breadcrumbs=array(
	'Formularios'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Desplegar Formularios', 'url'=>array('index')),
	array('label'=>'Crear nuevo Formulario', 'url'=>array('create')),
	array('label'=>'Modificar Formulario', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Borrar Formulario', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Formulario', 'url'=>array('admin')),
    array('label'=>'Nueva Pregunta', 'url'=>array('pregunta/create', 'formulario_id' => $model->id)),
);
?>

<h1>Formulario "<?php echo $model->name; ?>"</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'year',
		'description',
	),
)); ?>


<br>
<h1>Preguntas</h1>
<?php $this->widget('zii.widgets.CListView', array(
'dataProvider'=>$preguntaDataProvider,
'itemView'=>'/pregunta/_view',
)); ?>
