<?php
/* @var $this CarreraController */
/* @var $model Carrera */

$this->breadcrumbs=array(
	'Carreras'=>array('ratificar'),
	'Actualizar Responsables',
);

/*
$this->menu=array(
	array('label'=>'List Carrera', 'url'=>array('index')),
	array('label'=>'Create Carrera', 'url'=>array('create')),
	array('label'=>'Manage Carrera', 'url'=>array('admin')),
);
* */
?>

<h1>Responsables sobre los datos ingresados</h1>

<p>Antes de la generación del reporte solicitado, por favor revise a continuación los nombres y cargos de las personas responsables sobre los datos ingresados de <?php echo $ies->name; ?>. De ser el caso, sírvase actualizar esta información.</p>

<p>Tome en cuenta que estos nombres aparecerán junto al suyo al final del reporte, en la zona de firmas de responsabilidad.</p>
<hr />

<?php
/* @var $this CarreraController */
/* @var $model Carrera */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'carrera-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"><?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.</p>

	<?php echo $form->errorSummary($model); ?>
    
    <div class="row">
        <strong>Su nombre:</strong>
        <div>
		<?php echo $usuario->name; ?>
        </div>
	</div>

	<div class="row" style="margin-left:20px;">
		<?php echo $form->labelEx($model,'cargo_elaborado_por'); ?>
		<?php echo $form->textField($model,'cargo_elaborado_por',array('size'=>57,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'cargo_elaborado_por'); ?>
	</div>
<div>&nbsp;</div>
	<div class="row">
		<?php echo $form->labelEx($model,'aprobado_por'); ?>
		<?php echo $form->textField($model,'aprobado_por',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'aprobado_por'); ?>
	</div>
    
    <div class="row" style="margin-left:20px;">
		<?php echo $form->labelEx($model,'cargo_aprobado_por'); ?>
		<?php echo $form->textField($model,'cargo_aprobado_por',array('size'=>57,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'cargo_aprobado_por'); ?>
	</div>
<div>&nbsp;</div>
	<div class="row">
		<?php echo $form->labelEx($model,'rector'); ?>
		<?php echo $form->textField($model,'rector',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'rector'); ?>
	</div>
<div>&nbsp;</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton('Guardar y generar el reporte'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

