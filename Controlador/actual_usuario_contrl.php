<?php
     session_start();
     require '../Modelo/cnx.php';
     require '../Modelo/usuario.php';
     require '../Modelo/sistem.php';
     $db = new db();
     $db->_construct();
     $sistem = new sistem();
     $user = new usuario();
     $respuesta = $user->actualizar_datos($_POST['id_user'], $_POST['nombre'], $_POST['apellido'], $_POST['nac'], $_POST['ci'], $_POST['rol'], $_POST['usuario'], $_POST['password'], $_POST['estatus'], $_POST['ubicacion']);
     $mensaje='Usuario actualizado correctamente';
     $log = "Actualizo el usuario: ".$_POST['usuario'];
     $sistem->registrar_log($_SESSION['id'], $_SESSION['IP'], $log);
     echo json_encode($mensaje);
?>