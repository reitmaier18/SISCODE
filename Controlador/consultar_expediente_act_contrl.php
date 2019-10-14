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
        $tri_est=$tribunal->consultar_tribunal_estado($data[2]);
        $tri_est[0]="<option value=$tri_est[3]>$tri_est[0]</option>";
        $data = $procesado->consul_procesado($data[0]);
        $exp = $expediente->consultar_expediente($_POST['value']);
        $respuesta = $array = [$_POST['value'], $tri_est[0], $tri_est[2], $data[0], $data[1], $data[2], $data[3], $exp[1]];
        echo json_encode($respuesta);
    
    }
?>