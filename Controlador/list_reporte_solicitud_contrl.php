<?php  
	session_start();
	require '../Modelo/cnx.php';
	require '../Modelo/solicitud.php';
	require '../Modelo/sistem.php';
	$db = new db();
    $db->_construct();
	$solicitud = new solicitud();
	$sistem = new sistem();
	$data = $solicitud->listar_solicitudes_tramitadas_por_tiempo($_POST['desde'], $_POST['hasta']);
	$fila=0;
	for ($i=0; $i < count($data); $i++) { 
		$fila++;
		echo "<tr id='".($fila)."'>";
		echo "<td>".($fila)."</td>";
		echo "<td>".$data[$i]['fecha']."</td>";
		echo "<td>".$data[$i]['nombre']." ".$data[$i]['apellido']."</td>";
		echo "<td>".$data[$i]['tipo']."</td>";
		echo "<td>".$data[$i]['numero_expediente']."</td>";
		echo "<td>".$data[$i]['numero_pieza']."</td>";
		echo "<td>".$data[$i]['ubicacion']."</td>";
		echo "</tr>";
	}
	$log = "Consulto reporte de solicitudes";
    $sistem->registrar_log($_SESSION['id'], $_SESSION['IP'], $log);
?>