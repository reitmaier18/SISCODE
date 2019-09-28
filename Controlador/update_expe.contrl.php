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
    $dato = $expediente->consul_tribunal_procesado_update($_POST['id']);
    $expediente->update_expe($_POST['id'], $_POST['numero_expe']);
    $expediente->update_tribunal_procesado($dato[1], $_POST['tribunal']);
    $procesado->update_procesado($_POST['nombre_procesado'], $_POST['apellido_procesado'], $_POST['nac'], $_POST['ci_procesado'], $dato[0]);
    $_POST['numero_expe'];
    $_POST['nac'];
    $_POST['ci_procesado'];
    $_POST['nombre_procesado'];
    $_POST['apellido_procesado'];
    $_POST['estado'];
    $_POST['tribunal'];
    $_POST['id'];
?>