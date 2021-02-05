<?php 
	session_start();
    require '../Modelo/cnx.php';
    require '../Modelo/expediente.php';
    require '../Modelo/sistem.php';
    $db = new db();
    $db->_construct();
    $expediente = new expediente();
    $sistem = new sistem();
   	$pieza=$_GET['num'] ;
   	$ubicacion=$_POST['value'];
   	$expe=$_GET['expe'];
    $log = "Actualizo la pieza :".$pieza." del expediente: ".$expe;
    $sistem->registrar_log($_SESSION['id'], $_SESSION['IP'], $log);
   	echo $expediente->update_pieza($expe, $pieza, $ubicacion);
   	
   	//echo $pieza;

?>