<?php
    /**
	 * Controlador para cerrar session
	 */
    session_start();
    require '../Modelo/cnx.php';
    require '../Modelo/usuario.php';
    $db = new db();
    $db->_construct();
    $user = new usuario();
    $user->cerrar_sesion($_SESSION['usuario']);
    session_destroy();
    header('Location:../Vista/login2.php');
?>