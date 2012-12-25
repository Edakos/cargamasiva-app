<?php
/* @var $this ParroquiaController */
/* @var $data Parroquia */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codigo')); ?>:</b>
	<?php echo CHtml::encode($data->codigo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('canton_id')); ?>:</b>
	<?php echo CHtml::encode($data->canton_id); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('cabecera_cantonal')); ?>:</b>
	<?php echo CHtml::encode($data->cabecera_cantonal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('capital_provincial')); ?>:</b>
	<?php echo CHtml::encode($data->capital_provincial); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cambio')); ?>:</b>
	<?php echo CHtml::encode($data->cambio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ojo')); ?>:</b>
	<?php echo CHtml::encode($data->ojo); ?>
	<br />

	*/ ?>

</div>