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
			$log = "aprobó la solicitud".$_GET['n'];
			$sistem->registrar_log($_SESSION['id'], $_SESSION['IP'], $log);
			echo $action;
			break;
		
		case 'Alguacil':
			$action=$solicitud->transportar_solicitud($_GET['n']);
			$log = "transportó la solicitud".$_GET['n'];
			$sistem->registrar_log($_SESSION['id'], $_SESSION['IP'], $log);
			echo $action;
			break;

		case 'Archivista':
			$action=$solicitud->recibir_solicitud($_GET['n']);
			if ($action==1) {
				$a=$expediente->update_pieza_ubicacion($_GET['expediente'], $_GET['pieza'], $_GET['ubicacion']);
				if ($a=='True') {
					$log = "Recibió la solicitud".$_GET['n'];
					$sistem->registrar_log($_SESSION['id'], $_SESSION['IP'], $log);
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
				$a=$expediente->update_pieza_ubicacion($_GET['expediente'], $_GET['pieza'], $_GET['ubicacion']);
				if ($a=='True') {
					$log = "Recibió la solicitud".$_GET['n'];
					$sistem->registrar_log($_SESSION['id'], $_SESSION['IP'], $log);
					echo $action;
					
				}else{
					var_dump($a);
				}
			}else{
				echo $action;
			}
			break;
		
	}
	

?>