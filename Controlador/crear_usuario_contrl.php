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
    $resp = $user->crear_usuario($_POST['nombre'], $_POST['apellido'], $_POST['nac'], $_POST['ci'], $_POST['rol'], $_POST['usuario'], $_POST['password']);
    switch ($resp) {
        case 0:
            echo json_encode('El usuario no fue creado, información de identificación duplicada');
            break;
        
        case 1:
            echo json_encode('El usuario fue creado exitosamente');
            break;
            
        default:
            # code...
            break;
    }
    
    //echo $resp;
    //header('Location:../Vista/main.php');
?>