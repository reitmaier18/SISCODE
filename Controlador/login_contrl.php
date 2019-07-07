<?php
    /**
	 * Controlador de login
	 */
    require '../Modelo/cnx.php';
    require '../Modelo/usuario.php';
    $db = new db();
    $db->_construct();
    $user = new usuario();
    //echo json_encode($_POST['envio']);
    
    $login = $user->login($_POST['user'], $_POST['password']);
    $u = base64_decode($login[2]);
    $p = base64_decode($login[3]);    
    if ($login[0]!=NULL) {
        //echo "Aqui estoy";
        switch ($login[5]) {
            case 0:
                //echo "Entraste";
                $estatus = $user->iniciar_sesion($_POST['user'], $_POST['password']);
                if ($estatus == 'FALSE') {
                    echo $estatus;                    
                }else {
                    session_start();
                    $_SESSION['nombre']=$login[0];
                    $_SESSION['apellido']=$login[1];
                    $_SESSION['usuario']=$_POST['user'];
                    $_SESSION['rol']=$login[4];
                    echo $_SESSION['user'];
                    header('Location:../Vista/main.php');
                }
                break;
            
            case 1:
                echo "Este usuario se encuentra activo en otro navegador o PC, por favor cerrar sesión para poder ingresar";
                break;
            
            case 2:
                echo "Este usuario se encuentra bloqueado";
                break;    

            default:
                # code...
                break;
        }
        
    }
    else {
        header('Location:../Vista/login2.php');
    }
    //$login[];
    //var_dump($login);
    
?>