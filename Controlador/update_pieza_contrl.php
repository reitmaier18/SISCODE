<?php 
	session_start();
    require '../Modelo/cnx.php';
    require '../Modelo/expediente.php';
    $db = new db();
    $db->_construct();
    $expediente = new expediente();
   	$pieza=$_GET['num'] ;
   	$ubicacion=$_POST['value'];
   	$expe=$_GET['expe'];
   	echo $expediente->update_pieza($expe, $pieza, $ubicacion);
   	
   	//echo $pieza;

?>