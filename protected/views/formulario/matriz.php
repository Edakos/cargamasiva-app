<h1>Matriz de respuestas del Formulario Institucional</h1>

<?php



echo "<table border=1>";

$primera_vez = true;

foreach($ies_todas as $ies) {
    $data = $ies->getEstructura();
    $r = '';
    
    if ($primera_vez) {
        $r .= '<tr>';
        $r .= '<th>Nombre IES</th>';
        $r .= '<th>Código IES</th>';
        
        $r .= $this->generarTitulosMatriz($data);
        
        $r .= '</tr>';
    }
    $primera_vez = false;

    
    
    $r .= '<tr>';
    $r .= '<td>' . $ies->name . '</td>';
    $r .= '<td>' . $ies->code . '</td>';
    
    
    $r .= $this->generarFilaMatriz($data);
    
    $r .= '</tr>';
    
    echo $r;

    
}

echo "<table>";
?>



