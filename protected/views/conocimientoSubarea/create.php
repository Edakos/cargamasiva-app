<?php
/* @var $this ConocimientoSubareaController */
/* @var $model ConocimientoSubarea */

$this->breadcrumbs=array(
	'Conocimiento Subareas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ConocimientoSubarea', 'url'=>array('index')),
	array('label'=>'Manage ConocimientoSubarea', 'url'=>array('admin')),
);
?>

<h1>Create ConocimientoSubarea</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>