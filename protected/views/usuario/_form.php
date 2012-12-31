<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'usuario-form',
	'enableAjaxValidation'=>false,
    'htmlOptions' => array(
        'autocomplete' => 'off',
    ),
    
)); ?>

	<p class="note"><?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>256, 'autocomplete' => 'off')); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>256, 'autocomplete' => 'off')); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password_repeat'); ?>
		<?php echo $form->passwordField($model,'password_repeat',array('size'=>60,'maxlength'=>256, 'autocomplete' => 'off')); ?>
		<?php echo $form->error($model,'password_repeat'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'disabled'); ?>
		<?php echo $form->checkBox($model,'disabled'); ?>
		<?php echo $form->error($model,'disabled'); ?>
	</div>
    
	<div class="row">
		<?php echo $form->labelEx($model,'reset_password'); ?>
		<?php echo $form->checkBox($model,'reset_password'); ?>
		<?php echo $form->error($model,'reset_password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'first_name'); ?>
		<?php echo $form->textField($model,'first_name',array('size'=>60,'maxlength'=>256, 'autocomplete' => 'off')); ?>
		<?php echo $form->error($model,'first_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_name'); ?>
		<?php echo $form->textField($model,'last_name',array('size'=>60,'maxlength'=>256, 'autocomplete' => 'off')); ?>
		<?php echo $form->error($model,'last_name'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'cedula'); ?>
		<?php echo $form->textField($model,'cedula',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'cedula'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cellphone'); ?>
		<?php echo $form->textField($model,'cellphone',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'cellphone'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'address'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'birthday'); ?>
		<?php //echo $form->textField($model,'birthday'); ?>
<?php
$this->widget('zii.widgets.jui.CJuiDatePicker', array(
      'model'=>$model,
      'attribute'=>'birthday',
      'options'=>array(
              'showAnim'=>'fold',
              'dateFormat'=>'dd/mm/yy',
              'gotoCurrent' => true,
              //'minDate' => '0',
              'language'=> Yii::app()->getLanguage(),
     ),
));
?>
		<?php echo $form->error($model,'birthday'); ?>
	</div>    

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
