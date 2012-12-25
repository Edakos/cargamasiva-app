<?php
/* @var $this ParroquiaController */
/* @var $model Parroquia */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'parroquia-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'codigo'); ?>
		<?php echo $form->textField($model,'codigo',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'codigo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'canton_id'); ?>
		<?php echo $form->textField($model,'canton_id'); ?>
		<?php echo $form->error($model,'canton_id'); ?>
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

	<div class="row">
		<?php echo $form->labelEx($model,'cabecera_cantonal'); ?>
		<?php echo $form->textField($model,'cabecera_cantonal'); ?>
		<?php echo $form->error($model,'cabecera_cantonal'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'capital_provincial'); ?>
		<?php echo $form->textField($model,'capital_provincial'); ?>
		<?php echo $form->error($model,'capital_provincial'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cambio'); ?>
		<?php echo $form->textField($model,'cambio'); ?>
		<?php echo $form->error($model,'cambio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ojo'); ?>
		<?php echo $form->textField($model,'ojo'); ?>
		<?php echo $form->error($model,'ojo'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->