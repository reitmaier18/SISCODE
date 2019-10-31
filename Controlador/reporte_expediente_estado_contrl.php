<?php 
	session_start();
	require '../Modelo/cnx.php';
	require '../Modelo/expediente.php';
	$db = new db();
    $db->_construct();
    $expediente = new expediente();
    $data = $expediente->expediente_por_estado();
    $fila=0;
    for ($i=0; $i < count($data); $i++) { 
    	$fila++;
    	echo "<tr id='exp_est".$fila."'>";
    	echo "<td>".$fila."</td>";
    	echo "<td>".$data[$i]['estado']."</td>";
    	echo "<td>".$data[$i]['cantidad']."</td>";
    	echo "</tr>";
    }
?>