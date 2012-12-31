<?php
/* @var $this CargaController */
/* @var $data Carga */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('archivo_id')); ?>:</b>
	<?php echo CHtml::encode($data->archivo_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ies_id')); ?>:</b>
	<?php echo CHtml::encode($data->ies_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('formulario_id')); ?>:</b>
	<?php echo CHtml::encode($data->formulario_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
	<?php echo CHtml::encode($data->created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modified')); ?>:</b>
	<?php echo CHtml::encode($data->modified); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_by')); ?>:</b>
	<?php echo CHtml::encode($data->created_by); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('modified_by')); ?>:</b>
	<?php echo CHtml::encode($data->modified_by); ?>
	<br />

	*/ ?>

</div>