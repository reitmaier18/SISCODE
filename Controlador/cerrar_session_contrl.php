<?php
    /**
	 * Controlador para cerrar session
	 */
    session_start();
    require '../Modelo/cnx.php';
    require '../Modelo/usuario.php';
    require '../Modelo/sistem.php';
    $db = new db();
    $db->_construct();
    $sistem = new sistem();
    $user = new usuario();
    $user->cerrar_sesion($_SESSION['usuario']);
    $log = "Cerro sesion";
    $sistem->registrar_log($_SESSION['id'], $_SESSION['IP'], $log);
    session_destroy();
    header('Location:../Vista/login2.php');
?>