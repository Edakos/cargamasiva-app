<?php
/* @var $this UsuarioController */
/* @var $model Usuario */

$this->breadcrumbs=array(
	'Usuarios'
);

$this->menu=array(
	//array('label'=>'List Usuario', 'url'=>array('index')),
	array('label'=>'Nuevo usuario', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('usuario-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Usuarios</h1>

<p>
El sistema soporta operadores de comparación (&lt;, &lt;=, &gt;, &gt;=, &lt;&gt;
, =) al inicio de cada búsqueda, para especificar cómo debe ser realizada la comparación.
</p>

<?php echo CHtml::link('Búsqueda avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'usuario-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'username',
		'name',
		'cedula',
		/*
		'address',
		'cellphone',
		'birthday',
		'last_login_time',
		'created',
		'modified',
		'created_by',
		'modified_by',
		'deleted',
		'disabled',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
