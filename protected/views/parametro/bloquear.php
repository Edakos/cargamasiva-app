<?php
/* @var $this ParametroController */
/* @var $model Parametro */

$this->breadcrumbs = array(
	//'Parametros' => array('index'),
	'Bloqueo' => array('parametro/bloquear'),
	'Cargas',
);


$this->menu = array(
	array('label'=>'Bloquear Cargas', 'url'=>array('parametro/bloquear')),
	//array('label'=>'Create Parametro', 'url'=>array('create')),
    
	//array('label'=>'View Parametro', 'url'=>array('view', 'id'=>$model->id)),
	//array('label'=>'Manage Parametro', 'url'=>array('admin')),
);

?>

<h1>Bloquear / desbloquear cargas</h1>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'parametro-form',
	'enableAjaxValidation'=>false,
)); ?>

    <?php if ($bloquear_carga->valor): ?>
    <div class="flash-error">¡ALERTA! El sistema está BLOQUEADO para todas las cargas. Ya no se pueden realizar más cargas.</div>
    <?php else: ?>
    <div class="flash-success">El sistema está desbloqueado en todas las cargas.</div>
    <?php endif; ?>

    <?php echo $form->hiddenField($bloquear_carga, 'id', array('value' => $bloquear_carga->id)); ?>
    <?php echo $form->hiddenField($bloquear_carga,'valor',array('value' => ($bloquear_carga->valor ? 0 : 1))); ?>


	<div class="row buttons">
		<?php echo CHtml::submitButton($bloquear_carga->valor ? 'Desbloquear todas las cargas' : 'Bloquear todas las cargas'); ?>
	</div>

<?php $this->endWidget(); ?>

<div>&nbsp;</div>
<div>&nbsp;</div>
<hr>


<table>
</table>


<h2>Bloqueo / desbloqueo por IES *</h2>
<p><strong>* los cambios tendrán efecto solo si el sistema no está bloqueado para cargas, en la opción superior.</strong></p>

<table>
<tr>
    <th>IES</th>
    <th>Matrices</th>
    <th>PDF</th>
    <th>Formulario</th>
</tr>

<tr>
    <td>TODAS LAS IES</td>
    <td>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'parametro-form-matrices',
	'enableAjaxValidation'=>false,
)); ?>

    <?php if ($bloquear_carga_matriz->valor || $bloquear_carga->valor): ?>
    <div class="flash-error">
    <?php else: ?>
    <div class="flash-success">
    <?php endif; ?>
    
    

    <?php echo $form->hiddenField($bloquear_carga_matriz, 'id', array('value' => $bloquear_carga_matriz->id)); ?>
    <?php echo $form->hiddenField($bloquear_carga_matriz,'valor',array('value' => ($bloquear_carga_matriz->valor ? 0 : 1))); ?>


<?php if ($bloquear_carga->valor): ?>
<p>Bloqueado por una opción anterior.</p>
<?php else: ?>
	<div class="row buttons">
		<?php echo CHtml::submitButton($bloquear_carga_matriz->valor ? 'Desbloquear todas' : 'Bloquear todas'); ?>
	</div>
<?php endif; ?>

</div>
<?php $this->endWidget(); ?>

</td>
<td>



<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'parametro-form-pdf',
	'enableAjaxValidation'=>false,
)); ?>

    <?php if ($bloquear_carga_pdf->valor || $bloquear_carga->valor): ?>
    <div class="flash-error">
    <?php else: ?>
    <div class="flash-success">
    <?php endif; ?>
    
    

    <?php echo $form->hiddenField($bloquear_carga_pdf, 'id', array('value' => $bloquear_carga_pdf->id)); ?>
    <?php echo $form->hiddenField($bloquear_carga_pdf,'valor',array('value' => ($bloquear_carga_pdf->valor ? 0 : 1))); ?>

<?php if ($bloquear_carga->valor): ?>
<p>Bloqueado por una opción anterior.</p>
<?php else: ?>
	<div class="row buttons">
		<?php echo CHtml::submitButton($bloquear_carga_pdf->valor ? 'Desbloquear todas' : 'Bloquear todas'); ?>
	</div>
<?php endif; ?>

</div>
<?php $this->endWidget(); ?>

</td>
<td>&nbsp;</td>
</tr>

    
    
<?php foreach($lista_ies as $ies): ?>
<tr>
<td><?php echo $ies->code . '.- ' . $ies->name; ?></td>
<td>
<div class="<?php echo ($ies->bloqueado_carga_matriz || $bloquear_carga->valor ? 'flash-error' : 'flash-success'); ?>">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id' => 'form_carga_matriz_' . $ies['id'],
	'enableAjaxValidation'=>false,
)); ?>

    <?php echo $form->hiddenField($ies, 'id', array('value' => $ies->id)); ?>
    <?php echo $form->hiddenField($ies,'bloqueado_carga_matriz',array('rows'=>6, 'cols'=>50, 'value' => ($ies->bloqueado_carga_matriz ? 0 : 1))); ?>

<?php if ($bloquear_carga->valor): ?>
<p>Bloqueado por una opción anterior.</p>
<?php else: ?>
	<div class="row buttons">
		<?php echo CHtml::submitButton($ies->bloqueado_carga_matriz ? 'Desbloquear' : 'Bloquear'); ?>
	</div>
<?php endif; ?>

<?php $this->endWidget(); ?>
</div>
</td>
<td>
    <div class="<?php echo ($ies->bloqueado_carga_pdf || $bloquear_carga->valor? 'flash-error' : 'flash-success'); ?>">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id' => 'form_carga_pdf_' . $ies['id'],
	'enableAjaxValidation'=>false,
)); ?>

    <?php echo $form->hiddenField($ies, 'id', array('value' => $ies->id)); ?>
    <?php echo $form->hiddenField($ies,'bloqueado_carga_pdf',array('rows'=>6, 'cols'=>50, 'value' => ($ies->bloqueado_carga_pdf ? 0 : 1))); ?>


<?php if ($bloquear_carga->valor): ?>
<p>Bloqueado por una opción anterior.</p>
<?php else: ?>
	<div class="row buttons">
		<?php echo CHtml::submitButton($ies->bloqueado_carga_pdf  ? 'Desbloquear' : 'Bloquear'); ?>
	</div>
<?php endif; ?>

<?php $this->endWidget(); ?>
</div>
</td>



<td>
    <div class="<?php echo ($ies->bloqueado_formulario? 'flash-error' : 'flash-success'); ?>">
    <?php //if (!$ies->bloqueado_formulario): ?>
        <!-- Formulario desbloqueado -->
    <?php //else: ?>
    
<?php $form=$this->beginWidget('CActiveForm', array(
	'id' => 'form_formulario_' . $ies['id'],
	'enableAjaxValidation'=>false,
)); ?>
    <?php echo $form->hiddenField($ies, 'id', array('value' => $ies->id)); ?>
    <?php echo $form->hiddenField($ies,'bloqueado_formulario',array('rows'=>6, 'cols'=>50, 'value' => ($ies->bloqueado_formulario ? 0 : 1))); ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton($ies->bloqueado_formulario  ? 'Desbloquear' : 'Bloquear'); ?>
	</div>

<?php $this->endWidget(); ?>
<?php //endif; ?>
</div>
</td>



</tr>
<?php endforeach;?>
</table>
</div><!-- form -->
