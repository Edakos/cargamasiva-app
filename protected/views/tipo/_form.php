<?php
/* @var $this TipoController */
/* @var $model Tipo */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tipo-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"><?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('app', $model->isNewRecord ? 'Create' : 'Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
