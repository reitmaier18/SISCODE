<?php 
	session_start();
	require '../Modelo/cnx.php';
	require '../Modelo/expediente.php';
	$db = new db();
    $db->_construct();
    $expediente = new expediente();
    $data = $expediente->inventario();
    $fila=0;
    for ($i=0; $i < count($data) ; $i++) { 
    	$fila++;
    	echo "<tr id='inventario".$fila."'>";
    	echo "<td>".$fila."</td>";
    	echo "<td>".$data[$i]['numero_expediente']."</td>";
    	echo "<td>".$data[$i]['numero_pieza']."</td>";
    	echo "<td>".$data[$i]['ubicacion']."</td>";
    	echo "</tr>";
    }
?>