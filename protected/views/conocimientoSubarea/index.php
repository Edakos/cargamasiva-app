<?php
/* @var $this ConocimientoSubareaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Conocimiento Subareas',
);

$this->menu=array(
	array('label'=>'Create ConocimientoSubarea', 'url'=>array('create')),
	array('label'=>'Manage ConocimientoSubarea', 'url'=>array('admin')),
);
?>

<h1>Conocimiento Subareas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
