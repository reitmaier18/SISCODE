<?php
    session_start();
    require '../Modelo/cnx.php';
    require '../Modelo/tribunal.php';
    $db = new db();
    $db->_construct();
    $tribunal = new tribunal();
    $respuesta=$tribunal->añadir_tribunal($_POST['tribunal'],$_POST['estado']);
    
?>