<?php
/* @var $this CargaController */
/* @var $model Carga */

$this->breadcrumbs=array(
	'Realizar Cargas'
);

?>

<h1>Realizar Cargas de Formularios y Documentación</h1>
<hr/>
<?php if(isset($_GET['success'])): ?>
    <div class="flash-success">La carga del archivo se realizó con éxito.</div>
<?php elseif(isset($_GET['error'])): ?>
    <div class="flash-error">No se pudo realizar la carga del archivo. 
    <?php if ($_GET['error'] == 'nombre_invalido'): ?>
        El nombre <strong>y la extensión</strong> del archivo debe coincidir exactamente con los listados abajo.
        
        Tenga en cuenta que los formularios deben tener extensión .xslx ylos documentos deben tener extensión .pdf
        
    <?php elseif ($_GET['error'] == 'sin_permisos'): ?>
        Error interno de permisos de escritura. Si el error persiste, por favor contáctese a <a href="mailto:sniese@senescyt.gob.ec">sniese@senescyt.gob.ec</a> indicando sobre este problema.
    <?php elseif ($_GET['error'] == 'archivo_save'): ?>
        Error interno de guardado del archivo en la base de datos. Si el error persiste, por favor contáctese a <a href="mailto:sniese@senescyt.gob.ec">sniese@senescyt.gob.ec</a> indicando sobre este problema.
    <?php elseif ($_GET['error'] == 'carga_save'): ?>
        Error interno de guardado de la carga en la base de datos. Si el error persiste, por favor contáctese a <a href="mailto:sniese@senescyt.gob.ec">sniese@senescyt.gob.ec</a> indicando sobre este problema.
    <?php endif; ?>
    </div>
<?php endif; ?>

<?php
$form = $this->beginWidget(
    'CActiveForm',
    array(
        'id' => 'upload-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array(
            'enctype' => 'multipart/form-data',
        ),
    )
);

?>
<div style="padding:20px;text-align:center;">

<?php echo $form->labelEx($model, 'archivo'); ?>:
<?php echo $form->fileField($model, 'archivo'); ?>
<?php echo $form->error($model, 'archivo'); ?>

	
		<?php echo CHtml::submitButton('Enviar archivo'); ?>
	


</div>
<?php $this->endWidget(); ?>

<hr/>
<div style="clear:both;">
    <div xxxstyle="float:left;width:45%">
        <h3>Formularios</h3>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$formDataProvider2012,
    'template'=>'{items}',
    'columns'=>array(
        'description:html:Formulario',  
        array(
            'name' => 'Archivo',
            'value' => 'CHtml::image("/images/xls.png", "", array("width"=>20,"height"=>20)) . $data->name . ".csv"',
            'type' => 'html',
        ),
        array(
            'name' => 'Estado',
            'value' => 'CHtml::image("/images/".(count(Carga::model()->findByAttributes(array("ies_id"=>Ies::model()->findByAttributes(array("code" => Yii::app()->user->name))->id, "formulario_id"=>$data->id, ))) ? "green" : "red").".png", "", array("width"=>20,"height"=>20))',
            'type' => 'html',
        )
    ),
));
?>
    </div>
    <div xxxstyle="float:right;width:45%">
        <h3>Documentación</h3>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$docDataProvider2012,
    'template'=>'{items}',
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
            'value' => 'CHtml::image("/images/".(count(Carga::model()->findByAttributes(array("ies_id"=>Ies::model()->findByAttributes(array("code" => Yii::app()->user->name))->id, "documento_id"=>$data->id, ))) ? "green" : "red").".png", "rojo", array("width"=>20,"height"=>20))',
            'type' => 'html',
        )
    ),
));
?>
    </div>
</div>
