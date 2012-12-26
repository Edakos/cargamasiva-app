<?php
/* @var $this TipoController */
/* @var $model Tipo */

$this->breadcrumbs=array(
	'Tipos'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Ver todos los Tipos', 'url'=>array('index')),
	//array('label'=>'Create Tipo', 'url'=>array('create')),
	//array('label'=>'View Tipo', 'url'=>array('view', 'id'=>$model->id)),
	//array('label'=>'Administrar Tipo', 'url'=>array('admin')),
);
?>

<h1>Modificar Tipo "<?php echo $model->name; ?>"</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
