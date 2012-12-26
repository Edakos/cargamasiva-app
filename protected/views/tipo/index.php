<?php
/* @var $this TipoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tipos',
);

$this->menu=array(
	array('label'=>'Crear Nuevo Tipo', 'url'=>array('create')),
	//array('label'=>'Manage Tipo', 'url'=>array('admin')),
);
?>

<h1>Tipos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
