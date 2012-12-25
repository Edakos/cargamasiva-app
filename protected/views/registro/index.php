<?php
/* @var $this RegistroController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Registros',
);

$this->menu=array(
	array('label'=>'Create Registro', 'url'=>array('create')),
	array('label'=>'Manage Registro', 'url'=>array('admin')),
);
?>

<h1>Registros</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
