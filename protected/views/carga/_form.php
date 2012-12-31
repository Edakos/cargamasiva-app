<?php
/* @var $this CargaController */
/* @var $model Carga */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'carga-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'archivo_id'); ?>
		<?php echo $form->textField($model,'archivo_id'); ?>
		<?php echo $form->error($model,'archivo_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ies_id'); ?>
		<?php echo $form->textField($model,'ies_id'); ?>
		<?php echo $form->error($model,'ies_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'formulario_id'); ?>
		<?php echo $form->textField($model,'formulario_id'); ?>
		<?php echo $form->error($model,'formulario_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created'); ?>
		<?php echo $form->textField($model,'created'); ?>
		<?php echo $form->error($model,'created'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'modified'); ?>
		<?php echo $form->textField($model,'modified'); ?>
		<?php echo $form->error($model,'modified'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created_by'); ?>
		<?php echo $form->textField($model,'created_by'); ?>
		<?php echo $form->error($model,'created_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'modified_by'); ?>
		<?php echo $form->textField($model,'modified_by'); ?>
		<?php echo $form->error($model,'modified_by'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->