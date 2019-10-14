<?php
    /**
	 * Controlador de login
	 */
    require '../Modelo/cnx.php';
    require '../Modelo/usuario.php';
    require '../Modelo/sistem.php';
    $db = new db();
    $db->_construct();
    $user = new usuario();
    $sistem = new sistem();
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
                    
                }else {
                    session_start();
                    if (isset($_SERVER["HTTP_CLIENT_IP"]))
                    {
                        $_SESSION['IP']=$_SERVER["HTTP_CLIENT_IP"];
                    }
                    elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"]))
                    {
                        $_SESSION['IP']=$_SERVER["HTTP_X_FORWARDED_FOR"];
                    }
                    elseif (isset($_SERVER["HTTP_X_FORWARDED"]))
                    {
                        $_SESSION['IP']=$_SERVER["HTTP_X_FORWARDED"];
                    }
                    elseif (isset($_SERVER["HTTP_FORWARDED_FOR"]))
                    {
                        $_SESSION['IP']=$_SERVER["HTTP_FORWARDED_FOR"];
                    }
                    elseif (isset($_SERVER["HTTP_FORWARDED"]))
                    {
                        $_SESSION['IP']=$_SERVER["HTTP_FORWARDED"];
                    }
                    else
                    {
                        $_SESSION['IP']=$_SERVER["REMOTE_ADDR"];
                    }
                    $_SESSION['nombre']=$login[0];
                    $_SESSION['apellido']=$login[1];
                    $_SESSION['usuario']=$_POST['user'];
                    $_SESSION['rol']=$login[4];
                    $_SESSION['ubicacion']=$login[6];
                    $_SESSION['id']=$login[7];
                    $log = "Inicio sesión";
                    $sistem->registrar_log($_SESSION['id'], $_SESSION['IP'], $log);
                    echo json_encode(1);
                    
                }
                break;
            
            case 1:
                echo json_encode(2);
                //echo "Este usuario se encuentra activo en otro navegador o PC, por favor cerrar sesión para poder ingresar";
                break;
            
            case 2:
                echo json_encode(3);
                //echo "Este usuario se encuentra bloqueado";
                break;    

            default:
                #
                break;
        }
        
        
    }
    else {
        echo json_encode(0); 
    }
    
    //$login[];
    //var_dump($login);
   
?>