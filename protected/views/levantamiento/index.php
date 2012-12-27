<?php
/* @var $this LevantamientoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Levantamientos',
);

$this->menu=array(
	array('label'=>'Create Levantamiento', 'url'=>array('create')),
	array('label'=>'Manage Levantamiento', 'url'=>array('admin')),
);
?>

<h1>Levantamientos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
