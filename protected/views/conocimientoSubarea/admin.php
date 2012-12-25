<?php
/* @var $this ConocimientoSubareaController */
/* @var $model ConocimientoSubarea */

$this->breadcrumbs=array(
	'Conocimiento Subareas'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List ConocimientoSubarea', 'url'=>array('index')),
	array('label'=>'Create ConocimientoSubarea', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('conocimiento-subarea-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Conocimiento Subareas</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'conocimiento-subarea-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'codigo',
		'name',
		'descripcion',
		'conocimiento_area_id',
		'created',
		/*
		'modified',
		'created_by',
		'modified_by',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
