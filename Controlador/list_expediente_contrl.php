<?php 
	session_start();
    require '../Modelo/cnx.php';
    require '../Modelo/expediente.php';
    require '../Modelo/tribunal.php';
    $db = new db();
    $db->_construct();
    $expediente = new expediente();
    $tribunal = new tribunal();
    $data=$expediente->list_expediente();
    $a=count($data);
    for ($i=0; $i < $a; $i++) { 
    	
    	echo "<tr>";
    	echo "<td>".($i+1)."</td>";
    	echo "<td>".$data[$i]['numero_expediente']."</td>";
    	if ($data[$i]['nacionalidad']==1) {
    		echo "<td>V-".$data[$i]['cedula_acusado']."</td>";
    	}else{
    		echo "<td>E-".$data[$i]['cedula_acusado']."</td>";
    	}
    	echo "<td>".$data[$i]['nombre_acusado']." ".$data[$i]['apellido_acusado']."</td>";
    	$estado=$expediente->consultar_estado($data[$i]['estado_id']);
    	echo "<td>".$estado[0]."</td>";
    	echo "<td>".$data[$i]['tribunal']."</td>";
    	echo "</tr>";
    	
    	
    	
    	//var_dump($estado);
    }
    
?>