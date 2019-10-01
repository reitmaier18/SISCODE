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
    //var_dump($data);
    if ($data=='Este expediente no existe') {
        echo ($data);
    }else{
        $tri_est=$tribunal->consultar_tribunal_estado($data[2]);
        //$tri_est[0]="<option value=$data[1]>$tri_est[0]</option>";
        var_dump($data[1]);
        $data = $procesado->consul_procesado($data[0]);
        $respuesta = $array = ['numero_expediente'=>$_POST['value'], 'tribunal' => $tri_est[0], 'estado' => $tri_est[1], 'nombre' => $data[0], 'apellido' => $data[1], 'nacionalidad' => $data[2], 'cedula'=> $data[3]];
        //$respuesta = $array = [$_POST['expediente_actualizar'], $tri_est[0], $tri_est[1], $data[0], $data[1], $data[2], $data[3]];
        //echo $array[0];
        if ($respuesta['nacionalidad']==1) {
            $respuesta['nacionalidad']='V-';
        }elseif ($respuesta['nacionalidad']==2) {
            $respuesta['nacionalidad']='E-';
        }
        echo "<tr>";
        echo "<td>1</td>";
        echo "<td>".$respuesta['numero_expediente']."</td>";
        echo "<td>".$respuesta['nacionalidad'].$respuesta['cedula']."</td>";
        echo "<td>".$respuesta['nombre']." ".$respuesta['apellido']."</td>";
        echo "<td>".$respuesta['estado']."</td>";
        echo "<td>".$respuesta['tribunal']."</td>";
        echo "<td><img src='img/icon7.png' id='edit' data-toggle='modal' data-target='#actualizar_expediente' onclick='update_form_expe();' title='Editar'> <img src='img/icon8.png' id='detail' onclick='list_pieza();' title='Información'></td>";
        echo "</tr>";
    }
    
    
?>