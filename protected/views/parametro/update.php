<?php
/* @var $this ParametroController */
/* @var $model Parametro */

$this->breadcrumbs=array(
	'Parametros'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Parametro', 'url'=>array('index')),
	array('label'=>'Create Parametro', 'url'=>array('create')),
	array('label'=>'View Parametro', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Parametro', 'url'=>array('admin')),
);
?>

<h1>Update Parametro <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>