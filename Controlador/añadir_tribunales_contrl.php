<?php
    session_start();
    require '../Modelo/cnx.php';
    require '../Modelo/tribunal.php';
    require '../Modelo/sistem.php';
    $db = new db();
    $db->_construct();
    $sistem = new sistem();
    $tribunal = new tribunal();
	$respuesta=$tribunal->añadir_tribunal($_POST['tribunal'],$_POST['estado']);
	$log = "Añadio el tribunal: ".$_POST['tribunal'];
	$sistem->registrar_log($_SESSION['id'], $_SESSION['IP'], $log);
    
?>