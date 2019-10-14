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
    //var_dump($_POST);
    $num=$_POST['numero_expe'];
    $id=$_POST['id'];
    $nac=$_POST['nac'];
    $ci=$_POST['ci_procesado'];
    $nombre=$_POST['nombre_procesado'];
    $apellido=$_POST['apellido_procesado'];
    $estado=$_POST['estado'];
    $tribunal=$_POST['tribunal'];
    //metodos para actualizar el registro del expediente
    $expediente->update_expe($id, $num);//actualizo registro del expediente
    $datos=$expediente->consul_tribunal_procesado_update($id);//consulto el id de la tabla tribunal procesado
    $procesado->update_procesado($nombre, $apellido, $nac, $ci, $datos[0]);//actualizo registro de la tabla procesado
    $resp=$expediente->update_tribunal_procesado($datos[1], $tribunal);//actualizo el id del tribunal en la tabla tribunal procesado
    //var_dump($resp);
    $log = "Actualizo el expediente ".$_POST['numero_expe'];
    $sistem->registrar_log($_SESSION['id'], $_SESSION['IP'], $log);
?>