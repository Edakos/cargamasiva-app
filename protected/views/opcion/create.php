<?php
/* @var $this OpcionController */
/* @var $model Opcion */

$this->breadcrumbs=array(
	'Opcions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Opcion', 'url'=>array('index')),
	array('label'=>'Manage Opcion', 'url'=>array('admin')),
);
?>

<h1>Create Opcion</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>