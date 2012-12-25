<?php
/* @var $this FormularioController */
/* @var $data Formulario */
?>

<div class="view">

    <h2><?php echo CHtml::link(CHtml::encode($data->name), array('view', 'id'=>$data->id)); ?></h2>
	<?php echo CHtml::encode($data->descripcion); ?>

</div>
