<?php
/* @var $this CantonController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Cantons',
);

$this->menu=array(
	array('label'=>'Create Canton', 'url'=>array('create')),
	array('label'=>'Manage Canton', 'url'=>array('admin')),
);
?>

<h1>Cantons</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
