<?php
/* @var $this OpcionController */
/* @var $model Opcion */

$this->breadcrumbs=array(
	'Opcions'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Opcion', 'url'=>array('index')),
	array('label'=>'Create Opcion', 'url'=>array('create')),
	array('label'=>'View Opcion', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Opcion', 'url'=>array('admin')),
);
?>

<h1>Update Opcion <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>