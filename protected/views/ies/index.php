<?php
/* @var $this IesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ies',
);

$this->menu=array(
	array('label'=>'Create Ies', 'url'=>array('create')),
	array('label'=>'Manage Ies', 'url'=>array('admin')),
);
?>

<h1>Ies</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
