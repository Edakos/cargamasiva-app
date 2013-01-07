<?php
/* @var $this UsuarioController */
/* @var $model Usuario */


$this->breadcrumbs=array(
    ('Usuario ' . Yii::app()->user->name) => array('site/index'),
	'Modificar mis datos' => array('usuario/modificar'),
    'Cambiar mi contraseña',
);




$this->menu=array(
	array('label'=>'Modificar mis datos', 'url'=>array('usuario/modificar')),
);

?>

<h1><?php echo CHtml::image('/images/key.gif'); ?> Cambiar mi contraseña</h1>

<?php //echo $this->renderPartial('_form', array('model'=>$model, 'usuario_autenticado'=>'clave')); ?>


<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $form CActiveForm */
?>


<?php if (isset($_GET['obligatorio'])): ?>
<div class="flash-notice">El sistema está bloqueado hasta que realice el cambio de su contraseña.</div>
<?php endif; ?>


<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'usuarioClave-form',
	'enableAjaxValidation'=>false,
    'htmlOptions' => array(
        'autocomplete' => 'off',
    ),
)); ?>

	<p class="note"><?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.</p>

	<?php echo $form->errorSummary($model); ?>
    
	<div class="row">
		<?php echo $form->labelEx($model,'password', array('label' => 'Contraseña actual')); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>256, 'autocomplete' => 'off')); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password_new'); ?>
		<?php echo $form->passwordField($model,'password_new',array('size'=>60,'maxlength'=>256, 'autocomplete' => 'off')); ?>
		<?php echo $form->error($model,'password_new'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password_new_repeat'); ?>
		<?php echo $form->passwordField($model,'password_new_repeat',array('size'=>60,'maxlength'=>256, 'autocomplete' => 'off')); ?>
		<?php echo $form->error($model,'password_new_repeat'); ?>
	</div>

    

	<div class="row buttons">
		<?php echo CHtml::submitButton('Cambiar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
