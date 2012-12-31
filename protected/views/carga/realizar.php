<?php
/* @var $this CargaController */
/* @var $model Carga */

$this->breadcrumbs=array(
	'Realizar Cargas'
);

?>

<h1>Realizar Cargas de Formularios y Documentación</h1>
<hr/>
<div style="padding:20px;text-align:center;"><input type="file"> <input type="submit"></div>
<hr/>
<div style="clear:both;">
    <div style="float:left;width:45%">
        <h3>Formularios</h3>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$formDataProvider2012,
    'columns'=>array(
        'description:html:Formulario',  
        array(
            'name' => 'Archivo',
            'value' => 'CHtml::image("/images/xls.png", "rojo", array("width"=>20,"height"=>20)) . $data->name . ".xls"',
            'type' => 'html',
        ),
        array(
            'name' => 'Estado',
            'value' => 'CHtml::image("/images/red.png", "rojo", array("width"=>20,"height"=>20))',
            'type' => 'html',
        )
    ),
));
?>
    </div>
    <div style="float:right;width:45%">
        <h3>Documentación</h3>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$docDataProvider2012,
    'columns'=>array(
        'description:html:Documento',  
        array(
            //'class'=>'CLinkColumn',
            //'labelExpression'=>'$data->name == "IES" ? "INGRESAR" : $data->name . ".pdf"',
            //'header'=>'Archivo',
            //'urlExpression'=>'$data->name == "IES" ? "/formulario/llenar/" . $data->id : "/archivo/download/" . $data->name . ".xlsx"',
            
            
            'name' => 'Archivo',
            'value' => 'CHtml::image("/images/pdf.png", "rojo", array("width"=>20,"height"=>20)) . $data->name . ".pdf"',
            'type' => 'html',
        ),
        array(
            'name' => 'Estado',
            'value' => 'CHtml::image("/images/red.png", "rojo", array("width"=>20,"height"=>20))',
            'type' => 'html',
        )
    ),
));
?>
    </div>
</div>
