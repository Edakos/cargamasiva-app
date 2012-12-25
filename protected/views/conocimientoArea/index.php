<?php
/* @var $this ConocimientoAreaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Conocimiento Areas',
);

$this->menu=array(
	array('label'=>'Create ConocimientoArea', 'url'=>array('create')),
	array('label'=>'Manage ConocimientoArea', 'url'=>array('admin')),
);
?>

<h1>Conocimiento Areas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
