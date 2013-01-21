<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1><?php echo $ies->code . ' - ' . $ies->name; ?></h1>

<div style="clear:both;">

<div style="float:left;width:45%;">
    <hr/>
<h2>Levantamiento de datos 2011 y 2012</h2>
<p>Descarga el <?php echo CHtml::link('<img src="/images/pdf.png" width="20" height="20"> Manual de Usuario', '/archivos/2012_MANUAL_USUARIO.pdf'); ?> para la actualización de datos.</p>
<hr/>
<p>A continuación se listan los formularios para la carga de datos:</p>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$dataProvider2012,
    'template'=>'{items}',
    'columns'=>array(
        'description:html:Formulario',  
        array(
            'class'=>'CLinkColumn',
            //'labelExpression'=>'$data->name == "IES" ? "INGRESAR" : "2012_' . $ies->code . '_" . $data->name . ".xlsx"',
            'labelExpression'=>'$data->name == "IES" ? "INGRESAR" : "<img src=\"/images/xlsx.png\" width=\"25\" height=\"25\">" . $data->name . ".xlsx"',
            'header'=>'Archivo',
            //'urlExpression'=>'$data->name == "IES" ? "/formulario/llenar/" . $data->id : "/archivos/2012_' . $ies->code . '" . "_" . $data->name . ".xlsx"',
            'urlExpression'=>'$data->name == "IES" ? "/formulario/llenar/" . $data->id : "/archivos/" . $data->name . ".xlsx"',
        ),
    ),
));
?>
<hr/>
<?php 

$descargar_formulario_institucional = true;

foreach($estructura as $k => $v) {

    if ($v['cuenta']['total'] != $v['cuenta']['respondidas']) {
        $descargar_formulario_institucional = false;
    }
}
?>

<p>Descarga del 
<?php if ($descargar_formulario_institucional): ?>

    <?php if ($ies->bloqueado_formulario): ?>
        <?php echo CHtml::link('Formulario Institucional', '/formulario/actualizarResponsables');  ?>
    <?php else: ?>
        <?php echo CHtml::link('Formulario Institucional', '/formulario/actualizarResponsables', array('onclick' => 'return confirm("Una vez descargado el Formulario Institucional, Usted ya no podrá modificar su información. ¿Desea continuar?");')); //CHtml::link('Formulario Institucional', '/formulario/mostrar'); ?>
    <?php endif; ?>


<?php else: ?>
    <?php echo CHtml::link('Formulario Institucional', '#', array('onclick' => 'alert("Ingrese primero toda la información solicitada en el formulario institucional.");return false;')); //CHtml::link('Formulario Institucional', '/formulario/mostrar'); ?>
<?php endif; ?>
, imprimir y remitir a la SENESCYT con la respectiva firma del rector.</p>

<hr/>
<p>Descarga de la <?php echo CHtml::link('<img src="/images/xlsx.png" width="20" height="20"> Oferta Académica', "/archivos/2012_{$ies->code}_OFERTA_ACADEMICA.xlsx"); ?> (Información del Sistema Académico de la SENESCYT).</p>
</div>
<div style="float:right;width:45%;">
    <hr/>
<h2>Levantamiento de datos 2010</h2>
<p>Si desea revisar los datos 2010 que envió la institución a la SENESCYT, puede descargar los siguientes archivos:</p>
<?php
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
?>
<hr/>
<p>Descarga de la <?php echo CHtml::link('<img src="/images/pdf.png" width="20" height="20"> </im>ficha de presentación de información y documentos físicos', "/archivos/2010_{$ies->code}_FICHA_DCTOS.pdf"); ?> que la institución entregó a la SENESCYT. 
</p>
</div>

</div>

