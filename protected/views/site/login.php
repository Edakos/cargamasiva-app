<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - ' . Yii::t('app', 'Login');
$this->breadcrumbs=array(
	Yii::t('app', 'Login'),
);
?>

<div style="clear:both;">
<div style="float:left;width:50%;">
<h2>¡Bienvenido!</h2>
<p>
El presente sistema tiene como objetivo la actualización de datos de las instituciones de educación superior del Ecuador, correspondiente a los años 2011 y 2012.
</p>

<hr/>

<div style="clear:both;">
<?php echo CHtml::link(CHtml::image('/images/info_icon.png', 'Acerca de', array('width' => 100, 'height' => 100, 'style' => 'float:left;')), '/site/page?view=about');?>
<div style="float:left;width:280px;padding:10px;">
<h3>Sobre este sistema</h3>
Entérese de los antecedentes y objetivos de este sistema.
</div>
</div>

<hr/>

<div style="clear:both;">
<?php echo CHtml::link(CHtml::image('/images/smoke_signals.gif', 'Contacto', array('width' => 100, 'height' => 100, 'style' => 'float:left;')), '/site/contact');?>
<div style="float:left;width:280px;padding:10px;">
<h3>Contáctese con nosotros</h3>
Utilice el formulario de contacto para hacernos llegar sus observaciones y preguntas.
</div>
</div>

<hr/>

</div>
<div style="float:right;width:300px;margin:20px;padding:20px;background-color:#eee;border:solid 1px #ccc;margin-bottom:40px;">
<h1>Inicio de sesión</h1>

<!--p><?php //echo Yii::t('app', 'Please fill out the following form with your login credentials'); ?>:</p-->

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note"><?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
		<!--p class="hint">
			Hint: You may login with <kbd>demo</kbd>/<kbd>demo</kbd> or <kbd>admin</kbd>/<kbd>admin</kbd>.
		</p-->
	</div>

	<div class="row rememberMe">
		<?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model,'rememberMe'); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('app', 'Login')); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->

</div>

</div>

