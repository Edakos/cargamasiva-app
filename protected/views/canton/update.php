<?php
/* @var $this CantonController */
/* @var $model Canton */

$this->breadcrumbs=array(
	'Cantons'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Canton', 'url'=>array('index')),
	array('label'=>'Create Canton', 'url'=>array('create')),
	array('label'=>'View Canton', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Canton', 'url'=>array('admin')),
);
?>

<h1>Update Canton <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>