<?php 
	session_start();
    require '../Modelo/cnx.php';
    require '../Modelo/expediente.php';
    require '../Modelo/tribunal.php';
    require '../Modelo/sistem.php';
    $db = new db();
    $db->_construct();
    $expediente = new expediente();
    $tribunal = new tribunal();
    $sistem = new sistem();
    $data=$expediente->listado_expediente_reporte_por_fecha($_POST['desde'], $_POST['hasta']);
    $a=count($data);
    
    for ($i=0; $i < $a; $i++) { 
    	echo "<tr>";
    	echo "<td>".($i+1)."</td>";
    	echo "<td>".$data[$i]['fecha_expediente']."</td>";
    	echo "<td>".$data[$i]['numero_expediente']."</td>";
    	if ($data[$i]['nacionalidad']==1) {
    		echo "<td>V-".$data[$i]['cedula_acusado']."</td>";
    	}else{
    		echo "<td>E-".$data[$i]['cedula_acusado']."</td>";
    	}
    	echo "<td>".$data[$i]['nombre_acusado']." ".$data[$i]['apellido_acusado']."</td>";
    	echo "<td>".$data[$i]['estado']."</td>";
    	echo "<td>".$data[$i]['tribunal']."</td>";
    	echo "</tr>";
    }
    $log = "Consulto reporte de expedientes";
    $sistem->registrar_log($_SESSION['id'], $_SESSION['IP'], $log);
?>