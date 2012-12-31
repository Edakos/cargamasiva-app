<?php
/* @var $this CargaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Cargas',
);

$this->menu=array(
	array('label'=>'Create Carga', 'url'=>array('create')),
	array('label'=>'Manage Carga', 'url'=>array('admin')),
);
?>

<h1>Cargas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
