<?php
/* @var $this OpcionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Opcions',
);

$this->menu=array(
	array('label'=>'Create Opcion', 'url'=>array('create')),
	array('label'=>'Manage Opcion', 'url'=>array('admin')),
);
?>

<h1>Opcions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
