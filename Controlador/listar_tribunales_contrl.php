<?php
     session_start();
     require '../Modelo/cnx.php';
     require '../Modelo/tribunal.php';
     $db = new db();
     $db->_construct();
     $tribunal = new tribunal();
     $tribunal->listar_tribunales($_POST['envio']);     
?>