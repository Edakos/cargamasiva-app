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


<h1>Carreras Vigentes de <?php echo $ies->name; ?></h1>

<hr />
<div style="height:100px;">&nbsp;</div>

<?php
/*
$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$dataProvider2010,
    'template'=>'{items}',
    'columns'=>array(
        'description:html:Formulario',  
        array(
            'class'=>'CLinkColumn',
            'labelExpression'=>'$data->name == "IES" ? "INGRESAR" : "<img src=\"/images/xlsx.png\" width=\"25\" height=\"25\"> 2010_' . $ies->code . '_" . $data->name . ".xlsx"',
            'header'=>'Archivo',
            'urlExpression'=>'$data->name == "IES" ? "/formulario/view/" . $data->id : "/archivos/2010_' . $ies->code . '" . "_" . $data->name .".xlsx"',
        ),
    ),
));
*/
?>

<?php 
/*
$this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataProvider,
	//'itemView'=>'_ratificar_view',
    'template'=>'{items}',
    'enableSorting' => false,
    //'viewData' => array(),
    'columns'=>array(
        array(
            'name' => 'code',
            'value' => '"<div class=\"nobreak\">" . $data->code . "</div>"',
            'type'=>'raw',
        ),
        array(
            'name' => 'name',
            'value' => '"<div class=\"nobreak\">" . $data->name . "</div>"',
            'type'=>'raw',
        ),
        array(
            'name' => 'fecha_creacion',
            'value' => '"<div class=\"nobreak\" style=\"width:100px;\">" . $data->fecha_creacion . "</div>"',
            'type'=>'raw',
        ),
        array(
            'name' => 'estado',
            'value' => '"<div class=\"nobreak\">" . $data->estado . "</div>"',
            'type'=>'raw',
        ),
        array(
            'name' => 'ratificar_estado',
            'value' => '"<div class=\"nobreak\">" . $data->ratificar_estado . "</div>"',
            'type'=>'raw',
        ),
        //'code',  
        //'name',  
        //'fecha_creacion',
        //'estado',
        //'ratificar_estado',
        
    ),
)); 
*/ ?>

<table>
    <tr>
    <th>
        <div style="border-bottom:solid 1px #000">Carrera<br />&nbsp;</div>
    </th>
    <th>
        <div style="border-bottom:solid 1px #000">Fecha de creación</div>
    </th>
    <!--th>Estado</th-->
    <th>
        <div style="border-bottom:solid 1px #000">Ratificar estado vigente</div>
    </th>
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

//echo "<pre>";
//print_r($carreras_ies);
//echo "</pre>";
$count = 0;
foreach($carreras_ies as $carrera) {
    $zebra = ($count++ % 2 == 0) ? 'sombreado' : '';
    
    echo "<tr class='$zebra'>"; 
    echo "<td><div class='nobreak $zebra'>{$carrera['code']} - {$carrera['name']}</div></td>";
    echo "<td><div class='nobreak $zebra' style='width:25mm;'>{$carrera['fecha_creacion']}</div></td>";
    //echo "<td><div class='nobreak'>{$carrera['estado']}</div></td>";
    echo "<td><div class='nobreak $zebra' style='width:30mm;'>{$carrera['ratificar_estado']}</div></td>";
    echo "</tr>";
    
}

?>

</table>
<div style="height:100px;">&nbsp;</div>
<?php
$fecha = explode('-', date('d-n-Y-H-i'));
$meses = array(
    1 => 'enero',
    2 => 'febrero',
    3 => 'marzo',
    4 => 'abril',
    5 => 'mayo',
    6 => 'junio',
    7 => 'julio',
    8 => 'agosto',
    9 => 'septiembre',
    10 => 'octubre',
    11 => 'noviembre',
    12 => 'diciembre',
);
$fecha = $fecha[0] . ' de ' . $meses[$fecha[1]] . ' de ' . $fecha[2] . ', a las ' . $fecha[3] . ':' . $fecha[4] . ' horas.';
?>
<div class='nobreak'>
Documento generado el <?php echo $fecha; ?>
</div>
<div style="height:50px;">&nbsp;</div>
<table>
    <tr>
        <td>
            <div class='nobreak' style="width:60mm;padding:5px;">
                Elaborado por:
                <div style="height:100px;border-bottom:solid 2px #000;">&nbsp;</div>
                <div>&nbsp;<?php echo $usuario->name; ?></div>
                <div>&nbsp;<strong><?php echo $ies->cargo_elaborado_por; ?></strong></div>
                <div>&nbsp;<strong><?php echo strtoupper($ies->name); ?></strong></div>
            </div>
        </td>
        <td>
            <div class='nobreak' style="width:60mm;padding:5px;">
                Aprobado por:
                <div style="height:100px;border-bottom:solid 2px #000;">&nbsp;</div>
                <div>&nbsp;<?php echo $ies->aprobado_por; ?></div>
                <div>&nbsp;<strong><?php echo $ies->cargo_aprobado_por; ?></strong></div>
                <div>&nbsp;<strong><?php echo strtoupper($ies->name); ?></strong></div>
            </div>
        </td>
        <td>
            <div class='nobreak' style="width:60mm;padding:5px;">
                Rector:
                <div style="height:100px;border-bottom:solid 2px #000;">&nbsp;</div>
                <div>&nbsp;<?php echo $ies->rector; ?></div>
                <div>&nbsp;<strong>Rector</strong></div>
                <div>&nbsp;<strong><?php echo strtoupper($ies->name); ?></strong></div>
            </div>
        </td>
    </tr>
</table>
