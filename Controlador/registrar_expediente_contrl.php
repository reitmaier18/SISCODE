<?php
    session_start();
    require '../Modelo/cnx.php';
    require '../Modelo/procesado.php';
    require '../Modelo/expediente.php';
    require '../Modelo/sistem.php';
    $db = new db();
    $db->_construct();
    $procesado = new procesado();
    $expediente = new expediente();
    $sistem = new sistem();
    $asociado=@$_POST['numero_expediente_asociado'];
    if ($asociado==NULL) {
        $dato_procesado = $procesado->registrar_procesado($_POST['nombre_procesado'], $_POST['apellido_procesado'], $_POST['nac'], $_POST['ci_procesado']);
        if ($dato_procesado==NULL) {
            $log = "Error al registrar expediente ".$_POST['numero_expe'];
            $sistem->registrar_log($_SESSION['id'], $_SESSION['IP'], $log);
            echo "Hubo un error al consultar o registrar procesado";
        }else{
            $regis_expe = $expediente->registrar_expediente($_POST['numero_expe'], $dato_procesado, $_POST['tribunal'], $_POST['ubicacion']);
            $log = "Registro el expediente ".$_POST['numero_expe'];
            $sistem->registrar_log($_SESSION['id'], $_SESSION['IP'], $log);
            echo $regis_expe;
        }
    }else{
        $dato_procesado = $procesado->registrar_procesado($_POST['nombre_procesado'], $_POST['apellido_procesado'], $_POST['nac'], $_POST['ci_procesado']);
        if ($dato_procesado==NULL) {
            $log = "Error al registrar expediente ".$_POST['numero_expe'];
            $sistem->registrar_log($_SESSION['id'], $_SESSION['IP'], $log);
            echo "Hubo un error al consultar o registrar procesado";
        }else{
            $regis_expe = $expediente->registrar_expediente_asociado($_POST['numero_expe'], $dato_procesado, $_POST['tribunal'], $_POST['ubicacion'], $asociado);
            $log = "Registro el expediente ".$_POST['numero_expe'];
            $sistem->registrar_log($_SESSION['id'], $_SESSION['IP'], $log);
            echo $regis_expe;
        }
    }
    
?>