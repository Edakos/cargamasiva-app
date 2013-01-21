


<h1>Formulario Institucional de <?php echo $ies->name; ?></h1>


<?php foreach ($estructura as $e): ?>
<div style="height:100px;">&nbsp;</div>
    <hr/>
    <h2>Sección: <?php echo $e['texto']; ?></h2>
    <?php echo $this->generarForm($e['hijos'], true); ?>
<?php endforeach; ?>




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
