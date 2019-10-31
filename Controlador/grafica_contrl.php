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
    $dato = array($data[0]['count'], $dat[0]['count']);
    echo json_encode($dato);
?>