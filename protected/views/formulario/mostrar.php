<?php

$this->breadcrumbs = array(
    'Mostrar Formulario',
);

?>



<h1>Formulario de Datos Institucionales</h1>
<hr/>

<?php foreach ($estructura as $e): ?>
<hr/>
    <h2>Sección: <?php echo $e['texto']; ?></h3>
    
    <form method="post" action="/formulario/llenar">
    <?php echo $this->generarForm($e['hijos']); ?>
<?php endforeach; ?>

<hr />

<div style="clear:both;">

<div style="float:left;width:200px;margin:20px;">
Elaborado por:
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<hr>
<textarea><?php echo $usuario; ?></textarea>
</div>

<div style="float:left;width:200px;margin:20px;">
Aprobado por:
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<hr>
<textarea></textarea>
</div>

<div style="float:left;width:200px;margin:20px;">
Rector:
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<hr>
<textarea></textarea>
</div>

<div style="clear:both;"></div>

