<?php
     session_start();
     require '../Modelo/cnx.php';
     require '../Modelo/usuario.php';
     $db = new db();
     $db->_construct();
     $user = new usuario();
     $respuesta = $user->actualizar_datos($_POST['id_user'], $_POST['nombre'], $_POST['apellido'], $_POST['nac'], $_POST['ci'], $_POST['rol'], $_POST['usuario'], $_POST['password'], $_POST['estatus']);
     $mensaje='Usuario actualizado correctamente';
     echo json_encode($mensaje);
?>