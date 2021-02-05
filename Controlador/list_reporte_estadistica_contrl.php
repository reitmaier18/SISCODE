<?php 
	session_start();
	require '../Modelo/cnx.php';
    require '../Modelo/expediente.php';
    require '../Modelo/solicitud.php';
    $db = new db();
    $db->_construct();
    $expediente = new expediente();
    $solicitud = new solicitud();
    $data=$expediente->estadistica_expediente_reporte_por_fecha($_POST['desde'], $_POST['hasta']);
    $dat=$solicitud->estadistica_solicitudes_tramitadas_por_tiempo($_POST['desde'], $_POST['hasta']);
    $fila=0;
    for ($i=0; $i < 2; $i++) { 
    	$fila++;
    	echo "<tr>";
    	echo "<td>".$fila."</td>";
    	switch ($fila) {
    		case '1':
    			echo "<td>Expedientes procesados</td>";
    			echo "<td>".$data[0]['count']."</td>";
    			break;
    		
    		case '2':
    			echo "<td>Solicitudes tramitadas</td>";
    			echo "<td>".$dat[0]['count']."</td>";
    			break;
    	}
    	echo "</tr>";
    }
?>