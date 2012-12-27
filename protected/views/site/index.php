<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1>1001 Escuela Politécnica Nacional</h1>

<div style="clear:both;">

<div style="float:left;width:45%;">
    <hr/>
<h2>Levantamiento de datos 2011 y 2012</h2>
<p>Descarga el <?php echo CHtml::link('Manual de Usuario', '#'); ?> para la actualización de datos.</p>
<hr/>
<p>A continuación se listan los formularios para la carga de datos:</p>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$dataProvider2012,
    'columns'=>array(
        'description:html:Formulario',  
        array(
            'class'=>'CLinkColumn',
            'labelExpression'=>'$data->name == "IES" ? "INGRESAR" : $data->name . ".xlsx"',
            'header'=>'Archivo',
            'urlExpression'=>'$data->name == "IES" ? "/formulario/llenar/" . $data->id : "/archivo/download/" . $data->name . ".xlsx"',
        ),
    ),
));
?>
<hr/>
<p>Descarga del <?php echo CHtml::link('Formulario Institucional', '#'); ?>, imprimir y remitir a la SENESCYT con la respectiva firma del rector.</p>
<hr/>
<p>Descarga del <?php echo CHtml::link('reporte de estado de las carreras y programas académicos', '#'); ?> (Información del Sistema Académico de la SENESCYT).</p>
</div>
<div style="float:right;width:45%;">
    <hr/>
<h2>Levantamiento de datos 2010</h2>
<p>Si desea revisar los datos 2010 que envió la institución a la SENESCYT, puede descargar los siguientes archivos:</p>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$dataProvider2010,
    'columns'=>array(
        'description:html:Formulario',  
        array(
            'class'=>'CLinkColumn',
            'labelExpression'=>'$data->name == "IES" ? "INGRESAR" : $data->name . ".xlsx"',
            'header'=>'Archivo',
            'urlExpression'=>'$data->name == "IES" ? "/formulario/view/" . $data->id : "/archivo/download/" . $data->name . ".xlsx"',
        ),
    ),
));
?>
<hr/>
<p>Descarga de la <?php echo CHtml::link('ficha de presentación de información y documentos físicos', '#'); ?> que la institución entregó a la SENESCYT. 
</p>
</div>

</div>

