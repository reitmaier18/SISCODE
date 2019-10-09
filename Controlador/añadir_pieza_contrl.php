<?php 
	session_start();
    require '../Modelo/cnx.php';
    require '../Modelo/expediente.php';
    $db = new db();
    $db->_construct();
    $expediente = new expediente();
    echo $expediente->añadir_pieza($_GET['val'], $_POST['value']);
?>