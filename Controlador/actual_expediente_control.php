<?php 
	session_start();
	require '../Modelo/cnx.php';
    require '../Modelo/procesado.php';
    require '../Modelo/expediente.php';
    require '../Modelo/tribunal.php';
    $db = new db();
    $db->_construct();
    $procesado = new procesado();
    $expediente = new expediente();
    $tribunal = new tribunal();
?>