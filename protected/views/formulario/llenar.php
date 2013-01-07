<?php

if (!isset($_GET['seccion']) || empty($_GET['seccion'])) {
    $this->breadcrumbs = array(
        'Llenar Formulario',
    );
} else {
    $e = $estructura[$_GET['seccion']];
    
    $this->breadcrumbs = array(
        'Llenar Formulario' => 'llenar',
        $e['texto'],
    );
}

foreach($estructura as $k => $v) {
    $this->menu[] = array(
        //'label' => $v['texto'] . ' (' . $v['cuenta']['respondidas'] . ' de ' . $v['cuenta']['total'] . ')',
        'label' => $v['texto'],
        'url' => array('formulario/llenar', 'seccion' => $k), 
    );
}
/*
$this->menu = array(
	array('label'=>'Datos Generales', 'url'=>array('index')),
	array('label'=>'Datos de Representante Legal', 'url'=>array('admin')),
    array('label'=>'Datos de Información financiera y patrimonial', 'url'=>array('admin')),
    array('label'=>'Datos de Estudiantes', 'url'=>array('admin')),
    array('label'=>'Datos de Bienestar estudiantil', 'url'=>array('admin')),
    array('label'=>'Datos de Graduados', 'url'=>array('admin')),
    array('label'=>'Datos de Personal académico, técnico docente, administrativos y trabajadores', 'url'=>array('admin')),
    array('label'=>'Gobierno de la Institución', 'url'=>array('admin')),
    array('label'=>'Investigación', 'url'=>array('admin')),
    array('label'=>'Vinculación con la sociedad', 'url'=>array('admin')),
    array('label'=>'Infraestructura civil', 'url'=>array('admin')),
    array('label'=>'Infraestructura tecnológica', 'url'=>array('admin')),
);
*/
?>


<?php if (!isset($_GET['seccion']) || empty($_GET['seccion'])): ?>
<h1>Formulario de Datos Institucionales</h1>
<hr/>
<p>
Bienvenido al formulario de Datos Institucionales. Por favor seleccione una sección de la izquierda para completar el formulario.
</p>
<hr />
<div>&nbsp;</div>
<h3>Estado del llenado por secciones:</h3>
<ol>

<?php 

foreach($estructura as $k => $v) {

    echo '<li>'; 
    
    if ($v['cuenta']['total'] == $v['cuenta']['respondidas']) {
        echo CHtml::image('/images/green.png', '', array('width' => 20, 'height' => 20));
    } else {
        echo CHtml::image('/images/red.png', '', array('width' => 20, 'height' => 20));
    }
    echo ' <strong><a href="/formulario/llenar?seccion=' . $k . '">' . $v['texto'] . ':</a></strong> ';
    echo $v['cuenta']['total'] . ' preguntas, ' . $v['cuenta']['respondidas'] . ' respondidas.';
    echo '<div>&nbsp;</div>';
    echo '</li>';

}
?>

</ol>

<?php else: ?>

<?php
//registrando librerías javascript para validación:

  $baseUrl = Yii::app()->baseUrl; 
  $cs = Yii::app()->getClientScript();
  $cs->registerScriptFile($baseUrl . '/js/jquery-1.8.3.min.js');
  $cs->registerScriptFile($baseUrl . '/js/jquery.validity.min.js');
  $cs->registerScriptFile($baseUrl . '/js/jquery.validity.lang.es.js');
  $cs->registerCssFile($baseUrl . '/css/jquery.validity.css');
?>

    <h2>Sección: <?php echo $e['texto']; ?></h3>
    <hr/>
    <form method="post" action="/formulario/llenar">
    <input type='hidden' name="seccion" value="<?php echo $e['id']; ?>" />
    <input type='hidden' name="secciones" value="<?php echo implode(', ', (array_keys($estructura))); ?>" />
    <?php echo $this->generarForm($e['hijos']); ?>
    <input type="submit" value="Guardar información e ir a la siguiente sección >>"/>
    
    </form>
<script type="text/javascript">
$(function() { 
    $("form").validity(function() {
        //alert('en la validacion!');
<?php
//agregando validaciones:
foreach ($this->campos as $name => $tipo)  {
    //echo 'alert ($("#' . $name . '").id);' . "\n";
    echo '$("#' . $name . '").match("' . $tipo . '");' . "\n";
}
?>
    });
});
    </script>
<?php endif; ?>
