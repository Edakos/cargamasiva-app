<?php
/* @var $this ParroquiaController */
/* @var $model Parroquia */

$this->breadcrumbs=array(
	'Parroquias'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Parroquia', 'url'=>array('index')),
	array('label'=>'Create Parroquia', 'url'=>array('create')),
	array('label'=>'View Parroquia', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Parroquia', 'url'=>array('admin')),
);
?>

<h1>Update Parroquia <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>