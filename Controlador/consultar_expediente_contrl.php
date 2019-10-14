<?php
    session_start();
    require '../Modelo/cnx.php';
    require '../Modelo/procesado.php';
    require '../Modelo/expediente.php';
    require '../Modelo/tribunal.php';
    require '../Modelo/sistem.php';
    $db = new db();
    $db->_construct();
    $procesado = new procesado();
    $expediente = new expediente();
    $tribunal = new tribunal();
    $sistem = new sistem();
    $data = $expediente->consultar_datos_expediente($_POST['value']);
    if ($data=='Este expediente no existe') {
        $log = "Error al consultar expediente";
        $sistem->registrar_log($_SESSION['id'], $_SESSION['IP'], $log);
        echo ($data);
    }else{
        $tri_est=$tribunal->consultar_tribunal_estado($data[2]);
        $data = $procesado->consul_procesado($data[0]);
        $respuesta = $array = ['numero_expediente'=>$_POST['value'], 'tribunal' => $tri_est[0], 'estado' => $tri_est[1], 'nombre' => $data[0], 'apellido' => $data[1], 'nacionalidad' => $data[2], 'cedula'=> $data[3]];
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
    $log = "Consulto el expediente N° ".$_POST['value'];
    $sistem->registrar_log($_SESSION['id'], $_SESSION['IP'], $log);
    
?>