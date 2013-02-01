<?php
/* @var $this IesController */
/* @var $data Ies */

$ies = $data;

$formularios = array();
foreach ($ies->cargas as $carga){
    if (!empty ($carga->formulario_id) && !in_array($carga->archivo->name, $formularios)) {
        $formularios[] = $carga->archivo->name;
    }
}

$documentos = array();
foreach ($ies->cargas as $carga){
    if (!empty ($carga->documento_id) && !in_array($carga->archivo->name, $documentos)) {
        $documentos[] = $carga->archivo->name;
    }
}


?>

<div class="view">

	<h2>
    <?php //echo CHtml::link(CHtml::encode($data->code . ' - ' . $data->name), array('view', 'id'=>$data->id)); ?>
    <?php echo CHtml::encode($data->code . ' - ' . $data->name); ?>
    </h2>
	<br />

    <b>Formulario Institucional:</b>
	<?php echo CHtml::encode($data->bloqueado_formulario ? 'FINALIZADO (BLOQUEADO)' : 'No finalizado'); ?>
	<br />

    <b>Información de Carreras:</b>
	<?php echo CHtml::encode($data->bloqueado_carreras ? 'FINALIZADO (BLOQUEADO)' : 'No finalizado'); ?>
	<br />

    <b>Formularios cargados:</b>
    <ul>
        <?php 
        ?>
<?php foreach ($formularios as $formulario): ?>
<li>
<?php echo CHtml::link(CHtml::encode($formulario), '/archivos/' . $formulario); ?>
</li>
<?php endforeach;?>
    </ul>
    <br />

    <b>Documentos cargados:</b>
    <ul>
        <?php 
        ?>
<?php foreach ($documentos as $documento): ?>
<li>
<?php echo CHtml::link(CHtml::encode($documento), '/archivos/' . $documento); ?>
</li>
<?php endforeach;?>
    </ul>
    <br />

</div>
