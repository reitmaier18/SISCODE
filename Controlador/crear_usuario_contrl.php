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
    $user = new usuario();
    $sistem = new sistem();
    $resp = $user->crear_usuario($_POST['nombre'], $_POST['apellido'], $_POST['nac'], $_POST['ci'], $_POST['rol'], $_POST['usuario'], $_POST['password'], $_POST['ubicacion']);
    switch ($resp) {
        case 0:
            $log = "Error al crear usuario";
            $sistem->registrar_log($_SESSION['id'], $_SESSION['IP'], $log);
            echo json_encode('El usuario no fue creado, información de identificación duplicada');
            break;
        
        case 1:
            $log = "Creo el usuario: ".$_POST['usuario'];
            $sistem->registrar_log($_SESSION['id'], $_SESSION['IP'], $log);
            echo json_encode('El usuario fue creado exitosamente');
            break;
            
        default:
            # code...
            break;
    }
    
    //echo $resp;
    //header('Location:../Vista/main.php');
?>