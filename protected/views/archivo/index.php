<?php
/* @var $this ArchivoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Archivos',
);

$this->menu=array(
	array('label'=>'Create Archivo', 'url'=>array('create')),
	array('label'=>'Manage Archivo', 'url'=>array('admin')),
);
?>

<h1>Archivos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
