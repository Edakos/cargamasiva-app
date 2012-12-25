<?php
/* @var $this ConocimientoAreaController */
/* @var $model ConocimientoArea */

$this->breadcrumbs=array(
	'Conocimiento Areas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ConocimientoArea', 'url'=>array('index')),
	array('label'=>'Manage ConocimientoArea', 'url'=>array('admin')),
);
?>

<h1>Create ConocimientoArea</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>