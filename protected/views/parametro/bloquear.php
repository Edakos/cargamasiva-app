<?php
/* @var $this ParametroController */
/* @var $model Parametro */

$this->breadcrumbs=array(
	'Parametros'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Parametro', 'url'=>array('index')),
	array('label'=>'Create Parametro', 'url'=>array('create')),
	array('label'=>'View Parametro', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Parametro', 'url'=>array('admin')),
);
?>

<h1>Bloquear / desbloquear cargas</h1>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'parametro-form',
	'enableAjaxValidation'=>false,
)); ?>

    <?php if ($model->valor): ?>
    <div class="flash-error">¡ALERTA! El sistema está BLOQUEADO. Ya no se pueden realizar más cargas.</div>
    <?php else: ?>
    <div class="flash-success">El sistema está desbloqueado en las cargas.</div>
    <?php endif; ?>


    <?php echo $form->hiddenField($model,'valor',array('rows'=>6, 'cols'=>50, 'value' => ($model->valor ? 0 : 1))); ?>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->valor ? 'Desbloquear cargas' : 'Bloquear cargas'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
