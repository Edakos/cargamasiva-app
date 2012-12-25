<?php
/* @var $this IesController */
/* @var $model Ies */

$this->breadcrumbs=array(
	'Ies'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Ies', 'url'=>array('index')),
	array('label'=>'Manage Ies', 'url'=>array('admin')),
);
?>

<h1>Create Ies</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>