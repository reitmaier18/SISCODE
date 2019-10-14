<?php 
	session_start();
	require '../Modelo/cnx.php';
	require '../Modelo/sistem.php';
	$db = new db();
    $db->_construct();
    $sistem = new sistem();
    $data = $sistem->listar_log();
    $fila=0;
    for ($i=0; $i < count($data); $i++) { 
        $fila++;
    	echo "<tr id='log".$fila."'>";
    	echo "<td>".($fila)."</td>";
    	echo "<td>".$data[$i]['fecha']." (".$data[$i]['hora'].":".$data[$i]['minuto'].":".$data[$i]['segundo'].")</td>";
    	echo "<td>".$data[$i]['nombre']." ".$data[$i]['apellido']."</td>";
    	echo "<td>".$data[$i]['ip']."</td>";
    	echo "<td>".$data[$i]['descripcion']."</td>";
    	echo "</tr>";
    }
?>