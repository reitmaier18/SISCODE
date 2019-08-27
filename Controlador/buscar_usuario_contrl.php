<?php
     session_start();
     require '../Modelo/cnx.php';
     require '../Modelo/usuario.php';
     $db = new db();
     $db->_construct();
     $user = new usuario();
     $respuesta = $user->buscar_datos($_POST['nac'], $_POST['ci']);
     echo json_encode($respuesta);
?>