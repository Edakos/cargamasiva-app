<?php
/* @var $this ConocimientoAreaController */
/* @var $model ConocimientoArea */

$this->breadcrumbs=array(
	'Conocimiento Areas'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ConocimientoArea', 'url'=>array('index')),
	array('label'=>'Create ConocimientoArea', 'url'=>array('create')),
	array('label'=>'View ConocimientoArea', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ConocimientoArea', 'url'=>array('admin')),
);
?>

<h1>Update ConocimientoArea <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>