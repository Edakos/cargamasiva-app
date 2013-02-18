<?php
/* @var $this CargaController */
/* @var $model Carga */

$this->breadcrumbs=array(
	'Realizar Cargas'
);

?>

<h1>Realizar Cargas de Formularios y Documentación</h1>
<hr/>
<?php if($success): ?>
    <div class="flash-success">La carga del archivo "<?php echo $archivo_cargado; ?>" se realizó con éxito.</div>
<?php elseif(isset($error) && !empty($error)): ?>
    <div class="flash-error">No se pudo realizar la carga del archivo "<?php echo $archivo_cargado; ?>". 
    <?php if ($error == 'sin_archivo'): ?>
        No escogió ningún archivo. 
    <?php elseif ($error == 'bloqueado'): ?>
        El administrador del sistema ha bloqueado la carga de este tipo de archivos. Cualquier duda por favor contáctese a <a href="mailto:sniese@senescyt.gob.ec">sniese@senescyt.gob.ec</a>
    <?php elseif ($error == 'nombre_invalido'): ?>
        El nombre <strong>y la extensión</strong> del archivo debe coincidir exactamente con los listados abajo.
        <br />Tenga en cuenta que los formularios deben ser exportados a formato <strong>.csv</strong>, y que los documentos deben tener extensión <strong>.pdf</strong>
    <?php elseif ($error == 'sin_permisos'): ?>
        Error interno de permisos de escritura. Si el error persiste, por favor contáctese a <a href="mailto:sniese@senescyt.gob.ec">sniese@senescyt.gob.ec</a> indicando sobre este problema.
    <?php elseif ($error == 'archivo_save'): ?>
        Error interno de guardado del archivo en la base de datos. Si el error persiste, por favor contáctese a <a href="mailto:sniese@senescyt.gob.ec">sniese@senescyt.gob.ec</a> indicando sobre este problema.
    <?php elseif ($error == 'carga_save'): ?>
        Error interno de guardado de la carga en la base de datos. Si el error persiste, por favor contáctese a <a href="mailto:sniese@senescyt.gob.ec">sniese@senescyt.gob.ec</a> indicando sobre este problema.
    <?php elseif ($error == 'validacion'): ?>
        Error en la validación de los datos enviados.
    <?php endif; ?>
    <div>&nbsp;</div>

    <?php if (isset($mensaje) && !empty($mensaje)): ?>

    <div><strong>Detalles:</strong></div>
    
    <ul>
<?php
        if (is_array($mensaje)) {
            foreach ($mensaje as $msg) {
                if (is_array($msg)) {
                    foreach ($msg as $m) {
                        echo "<li>$m</li>";
                    }
                } else {
                    echo "<li>$msg</li>";
                }
            }
        } else {
            echo "<li>$mensaje</li>";
        }
?>
    </ul>
    <?php endif; ?>
    
    </div>
<?php endif; ?>


<?php if ($bloquear_carga): ?>
<div class="flash-error">El sistema ya no permite realizar más cargas.</div>
<?php else: ?>
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

<?php echo $form->labelEx($model, 'archivo_cargado'); ?>:
<?php echo $form->fileField($model, 'archivo_cargado'); ?>


	
		<?php echo CHtml::submitButton('Enviar archivo'); ?>
<strong><?php echo $form->error($model, 'archivo_cargado'); ?>	</strong>


</div>
<?php $this->endWidget(); ?>
<?php endif; ?>

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
