<?php
/* @var $this IesController */
/* @var $model Ies */

$this->breadcrumbs=array(
	'Ies'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Ies', 'url'=>array('index')),
	array('label'=>'Create Ies', 'url'=>array('create')),
	array('label'=>'View Ies', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Ies', 'url'=>array('admin')),
);
?>

<h1>Update Ies <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>