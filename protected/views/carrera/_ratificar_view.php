<?php
/* @var $this CarreraController */
/* @var $data Carrera */

$model = $data;
?>
<div class="view">
    
<div style="clear:both;">

<div  style="float:left;width:600px;">

	<h3>Carrera <?php echo CHtml::encode($data->code . ' - ' . $data->name); ?></h3>
	<br />

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes'=>array(
		'conocimiento_area',
		'conocimiento_subarea',
		'modalidad',
		'nivel',
		'ciudad',
        'fecha_creacion',
        'estado',
        'ratificar_estado',
	),
)); ?>


</div><!-- view -->

<div class="form" style="float:right;width:200px;">
 
<?php 

$form = $this->beginWidget('CActiveForm', array(
    'id'=>'carrera-' . $data->id . '-form',
    'enableAjaxValidation' => true,
        'htmlOptions'=>array(
       'onsubmit'=>"return false;",/* Disable normal form submit */
       'onkeypress'=>" if(event.keyCode == 13){ send(); } " /* Do ajax call when user presses enter key */
     ),
)); ?>
 
 
    <?php echo $form->errorSummary($model); ?>
 
    <div class="row">
        <?php echo $form->labelEx($model,'fecha_creacion'); ?>
        <?php echo $form->textField($model,'fecha_creacion'); ?>
<?php
/*
$this->widget('zii.widgets.jui.CJuiDatePicker', array(
      'model'=>$model,
      'attribute'=>'fecha_creacion',
      'options'=>array(
          'showAnim'=>'fold',
          'dateFormat'=>'dd/mm/yy',
          //'gotoCurrent' => true,
          //'minDate' => '0',
          'language'=> Yii::app()->getLanguage(),
          'htmlOption' => array(
                'value' => $model->fecha_creacion,
          ),
     ),
));
*/
?>

        <?php echo $form->error($model,'fecha_creacion'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model,'ratificar_estado', array('label' => 'Ratificar estado "' .$model->estado. '"')); ?>
        <?php echo $form->dropDownList($model,'ratificar_estado', array('' => '', 'RATIFICADO' => 'RATIFICADO', 'NO VIGENTE HABILITADO' => 'NO VIGENTE HABILITADO')); ?>
        <?php echo $form->error($model,'ratificar_estado'); ?>
    </div>
 
    <?php echo $form->hiddenField($model,'id'); ?>
    <?php echo $form->hiddenField($model,'ies_id'); ?>
 
    <div class="row buttons">
        <?php echo CHtml::Button('Actualizar Carrera ' . $model->code, array('onclick'=>'send("carrera-' . $model->id . '-form");')); ?> 
    </div>
    <div id="<?php echo 'carrera-' . $data->id . '-form_mensaje' ?>">&nbsp;</div>
 
<?php $this->endWidget(); ?>
 
</div><!-- form -->

</div>
<div style="clear:both;">&nbsp;</div>
</div>
