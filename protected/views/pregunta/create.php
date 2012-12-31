<?php
/* @var $this PreguntaController */
/* @var $model Pregunta */

$this->breadcrumbs=array(
	'Formularios' => array('formulario/index'),
    $formularioName => array('formulario/view', 'id' => $model->formulario_id),
	'Nueva Pregunta',
);

$this->menu=array(
    array('label'=>'Ver Formulario', 'url'=>array('formulario/view', 'id' => $model->formulario_id)),
    array('label'=>'Ver Tipos', 'url'=>array('tipo/index')),
);
?>

<h1>Nueva Pregunta del formulario "<?php echo $formularioName; ?>"</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'tipos'=>$tipos, 'preguntas'=>$preguntas)); ?>
