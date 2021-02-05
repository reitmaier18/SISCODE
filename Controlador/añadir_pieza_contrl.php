<?php 
	session_start();
    require '../Modelo/cnx.php';
    require '../Modelo/expediente.php';
    require '../Modelo/sistem.php';
    $db = new db();
    $db->_construct();
    $sistem = new sistem();
    $expediente = new expediente();
    $log = "Añadio una pieza al expediente: ".$_GET['val'];
    $sistem->registrar_log($_SESSION['id'], $_SESSION['IP'], $log);
    echo $expediente->añadir_pieza($_GET['val'], $_POST['value']);
?>