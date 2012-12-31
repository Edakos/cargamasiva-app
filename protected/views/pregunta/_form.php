<?php
/* @var $this PreguntaController */
/* @var $model Pregunta */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pregunta-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"><?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tipo_id'); ?>
        <?php echo $form->dropDownList($model,'tipo_id', $tipos); ?>
        <?php //echo $form->dropDownList($model, 'tipo_id', $tipos, array('empty' => '-')); ?>
		<?php echo $form->error($model,'tipo_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pregunta_id'); ?>
		<?php echo $form->dropDownList($model,'pregunta_id', $preguntas, array('empty' => '-')); ?>
		<?php echo $form->error($model,'pregunta_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'orden'); ?>
		<?php echo $form->textField($model,'orden'); ?>
		<?php echo $form->error($model,'orden'); ?>
	</div>


	<div class="row">
		<?php echo $form->hiddenField($model,'formulario_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
