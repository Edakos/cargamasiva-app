<?php
/* @var $this IesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Carreras',
);

$this->menu=array(
	//array('label'=>'Create Ies', 'url'=>array('create')),
	//array('label'=>'Manage Ies', 'url'=>array('admin')),
);
?>

<h1>Carreras de <?php echo $ies->name; ?></h1>

<p>
<?php if ($total_sin_ratificar == 0): ?>
<?php echo CHtml::image('/images/green.png', '', array('width' => 20, 'height' => 20)); ?>
 Se han ratificado todas las carreras.
<?php else: ?>
<?php echo CHtml::image('/images/red.png', '', array('width' => 20, 'height' => 20)); ?>
 Todavía faltan por ratificar <?php echo $total_sin_ratificar; ?> carrera<?php echo $total_sin_ratificar == 1 ? '' : 's'; ?>.
<?php endif; ?>
</p>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_ratificar_view',
    'template'=>'{sorter}<br />{pager}<br />{items}{pager}',
    'sortableAttributes'=>array(
        'code',
        'name',
        'modalidad',
        'nivel',
        'ciudad',
        'fecha_creacion',
        'estado',
        'ratificar_estado'
    ),
    'viewData' => array(),
)); ?>

<!--table border=4>
    <tr>
    <th>Carrera</th>
    <th>Área y subárea de conocimiento</th>
    <th>Modalidad</th>
    <th>Nivel</th>
    <th>Ciudad</th>
    <th>Fecha de creación</th>
    <th>Estado</th>
    <th>Ratificar estado</th>
    </tr>
<?php
/*
foreach($data as $carrera) {
    echo "<tr>"; 
    echo "<td>{$carrera->code} - {$carrera->name}</td>";
    echo "<td>{$carrera->conocimiento_area} - {$carrera->conocimiento_subarea}</td>";
    echo "<td>{$carrera->modalidad}</td>";
    echo "<td>{$carrera->nivel}</td>";
    echo "<td>{$carrera->ciudad}</td>";
    echo "<td><input value='{$carrera->fecha_creacion}'></td>";
    echo "<td>{$carrera->estado}</td>";
    echo "<td><select><option>RATIFICADO</option><option>NO VIGENTE HABILITADO</option></select></td>";
    echo "</tr>";
}
*/
?>

</table-->


<script type="text/javascript">
 
function send(id_form)
{
 
    var data = $("#" + id_form).serialize();
 
    //alert(data);
 
    $.ajax({
        type: 'POST',
        url: '<?php echo Yii::app()->createAbsoluteUrl('carrera/ratificar'); ?>',
        data: data,
        success: function(data){
            $('#' + id_form + '_mensaje').html('<div class="flash-success">Datos registrados con éxito.</div>');
        },
        error: function(data) { // if error occured
            $('#' + id_form + '_mensaje').html('<div class="flash-error">Hubo un error al tratar de registrar la información, por favor inténtelo nuevamente.</div>');
        },
        dataType:'html'
    });
}
 
</script>
