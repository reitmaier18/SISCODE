<?php
    session_start();
    require '../Modelo/cnx.php';
    require '../Modelo/procesado.php';
    require '../Modelo/expediente.php';
    require '../Modelo/tribunal.php';
    $db = new db();
    $db->_construct();
    $procesado = new procesado();
    $expediente = new expediente();
    $tribunal = new tribunal();
    $data = $expediente->consultar_datos_expediente($_POST['value']);
    if ($data=='Este expediente no existe') {
        echo 0;
    }else{
        $tri_est=$tribunal->consultar_tribunal_estado($data[1]);
        $tri_est[0]="<option selected value=$data[1]>$tri_est[0]</option>";
        $dato = $procesado->consul_procesado($data[0]);
        $respuesta = $array = [$_POST['value'], $tri_est[0], $tri_est[2], $dato[0], $dato[1], $dato[2], $dato[3], $data[1]];
        //echo $array[0];

        echo json_encode($respuesta);
    
    }
?>