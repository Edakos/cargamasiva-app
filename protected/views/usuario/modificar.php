<?php
/* @var $this UsuarioController */
/* @var $model Usuario */

$this->breadcrumbs=array(
    ('Usuario ' . Yii::app()->user->name) => array('site/index'),
	'Modificar mis datos',
);


$this->menu=array(
	array('label'=>'Cambiar mi contraseña', 'url'=>array('usuario/clave')),
);

?>

<h1><?php echo CHtml::image('/images/edit.gif'); ?> Modificar mis datos</h1>

<?php //echo $this->renderPartial('_form', array('model'=>$model, 'usuario_autenticado'=>'modificar')); ?>


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

	<!--p class="note"><?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.</p-->

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>256, 'autocomplete' => 'off')); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cedula'); ?>
		<?php echo $form->textField($model,'cedula',array('size'=>60,'maxlength'=>256, 'autocomplete' => 'off')); ?>
		<?php echo $form->error($model,'cedula'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>256, 'autocomplete' => 'off')); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cellphone'); ?>
		<?php echo $form->textField($model,'cellphone',array('size'=>60,'maxlength'=>256, 'autocomplete' => 'off')); ?>
		<?php echo $form->error($model,'cellphone'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>256, 'autocomplete' => 'off')); ?>
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
		<?php echo CHtml::submitButton('Guardar cambios'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

