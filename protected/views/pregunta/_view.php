<?php
/* @var $this PreguntaController */
/* @var $data Pregunta */
?>

<div class="view">

    <h2>
	<?php echo CHtml::link(CHtml::encode($data->name), array('view', 'id'=>$data->id)); ?>
	</h2>

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pregunta_id')); ?>:</b>
	<?php //echo CHtml::encode($data->pregunta_id); ?>
    <?php echo CHtml::encode(!empty($data->pregunta) ? $data->pregunta->name : ''); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_id')); ?>:</b>
	<?php echo CHtml::encode($data->tipo->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('orden')); ?>:</b>
	<?php echo CHtml::encode($data->orden); ?>
	<br />

	<b><?php /* echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
	<?php echo CHtml::encode($data->created); ?>
	<br />

	<?php 
	<b><?php echo CHtml::encode($data->getAttributeLabel('modified')); ?>:</b>
	<?php echo CHtml::encode($data->modified); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_by')); ?>:</b>
	<?php echo CHtml::encode($data->created_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modified_by')); ?>:</b>
	<?php echo CHtml::encode($data->modified_by); ?>
	<br />


	*/ ?>
	<b><?php echo CHtml::encode($data->getAttributeLabel('formulario_id')); ?>:</b>
	<?php echo CHtml::encode($data->formulario_id); ?>
	<br />

</div>
