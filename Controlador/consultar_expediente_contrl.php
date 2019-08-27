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
    $data = $expediente->consultar_expediente($_POST['expediente_actualizar']);
    if ($data=='Este expediente no existe') {
        echo json_encode($data);
    }else{
        $tri_est=$tribunal->consultar_tribunal_estado($data[1]);
        $tri_est[0]="<option value=$data[1]>$tri_est[0]</option>";
        $data = $procesado->consul_procesado($data[0]);
        //$respuesta = $array = ['numero_expediente'=>$_POST['expediente_actualizar'], 'tribunal' => $tri_est[0], 'estado' => $tri_est[1], 'nombre' => $data[0], 'apellido' => $data[1], 'nacionalidad' => $data[2], 'cedula'=> $data[3]];
        $respuesta = $array = [$_POST['expediente_actualizar'], $tri_est[0], $tri_est[1], $data[0], $data[1], $data[2], $data[3]];
        //echo $array[0];
        echo json_encode($respuesta);
    }
    
    
?>