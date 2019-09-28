<?php
    session_start();
    require '../Modelo/cnx.php';
    require '../Modelo/procesado.php';
    require '../Modelo/expediente.php';
    $db = new db();
    $db->_construct();
    $procesado = new procesado();
    $expediente = new expediente();
    $dato_procesado = $procesado->registrar_procesado($_POST['nombre_procesado'], $_POST['apellido_procesado'], $_POST['nac'], $_POST['ci_procesado']);
    if ($dato_procesado==NULL) {
        echo "Hubo un error al consultar o registrar procesado";
    }else{
        $regis_expe = $expediente->registrar_expediente($_POST['numero_expe'], $dato_procesado, $_POST['tribunal'], $_POST['ubicacion']);
        echo $regis_expe;
    }
?>