<?php
/* @var $this LevantamientoController */
/* @var $model Levantamiento */

$this->breadcrumbs=array(
	'Levantamientos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Levantamiento', 'url'=>array('index')),
	array('label'=>'Manage Levantamiento', 'url'=>array('admin')),
);
?>

<h1>Create Levantamiento</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>