<?php 
	session_start();
	require '../Modelo/cnx.php';
	require '../Modelo/expediente.php';
	require '../Modelo/solicitud.php';
	require '../Modelo/sistem.php';
	$db = new db();
    $db->_construct();
    $expediente = new expediente();
    $solicitud = new solicitud();
    $sistem = new sistem();
    $action=$solicitud->cancelar_solicitud($_GET['n']);
    $log = "canceló la solicitud".$_GET['n'];
	$sistem->registrar_log($_SESSION['id'], $_SESSION['IP'], $log);
    echo $action;
?>