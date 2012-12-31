<?php
/* @var $this ConocimientoSubareaController */
/* @var $model ConocimientoSubarea */

$this->breadcrumbs=array(
	'Conocimiento Subareas'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ConocimientoSubarea', 'url'=>array('index')),
	array('label'=>'Create ConocimientoSubarea', 'url'=>array('create')),
	array('label'=>'View ConocimientoSubarea', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ConocimientoSubarea', 'url'=>array('admin')),
);
?>

<h1>Update ConocimientoSubarea <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>