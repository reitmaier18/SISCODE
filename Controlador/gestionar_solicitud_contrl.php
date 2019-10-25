<?php 
	session_start();
	require '../Modelo/cnx.php';
	require '../Modelo/expediente.php';
	require '../Modelo/solicitud.php';
	require '../Modelo/sistem.php';
	$db = new db();
    $db->_construct();
    $expediente = new expediente();
    $solicitud = new solicitud();
    $sistem = new sistem();
    
	switch ($_SESSION['rol']) {
		case 'Jefe de archivo':
			$action=$solicitud->aprobar_solicitud($_GET['n']);
			echo $action;
			break;
		
		case 'Alguacil':
			$action=$solicitud->transportar_solicitud($_GET['n']);
			echo $action;
			break;

		case 'Archivista':
			$action=$solicitud->recibir_solicitud($_GET['n']);
			if ($action==1) {
				$a=$expediente->update_pieza_ubicacion($_GET['expediente'], $_GET['pieza'], $_GET['ubicacion']);
				if ($a=='True') {
					echo $action;
				}else{
					echo 0;
				}
			}else{
				echo $action;
			}
			break;

		case 'Juez':
			$action=$solicitud->recibir_solicitud($_GET['n']);
			if ($action==1) {
				$expediente->update_pieza_ubicacion($_GET['expediente'], $_GET['pieza'], $_GET['ubicacion']);
				if ($a=='True') {
					echo $action;
				}else{
					echo 0;
				}
			}else{
				echo $action;
			}
			break;
		
	}
	

?>