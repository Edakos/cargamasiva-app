<?php
/* @var $this CantonController */
/* @var $model Canton */

$this->breadcrumbs=array(
	'Cantons'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Canton', 'url'=>array('index')),
	array('label'=>'Manage Canton', 'url'=>array('admin')),
);
?>

<h1>Create Canton</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>