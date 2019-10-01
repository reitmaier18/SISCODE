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
        //var_dump($data[1]);
        $data = $procesado->consul_procesado($data[0]);
        $exp = $expediente->consultar_expediente($_POST['value']);
        /*$respuesta = $array = ['numero_expediente'=>$_POST['value'], 'tribunal' => $tri_est[3], 'estado' => $tri_est[2], 'nombre' => $data[0], 'apellido' => $data[1], 'nacionalidad' => $data[2], 'cedula'=> $data[3]];*/
        $respuesta = $array = [$_POST['value'], $tri_est[0], $tri_est[2], $data[0], $data[1], $data[2], $data[3], $exp[1]];
        //echo $array[0];
        //var_dump($tri_est);
        //var_dump($respuesta);
        echo json_encode($respuesta);
    
    }
?>