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
    $fecha = getdate();
    $fecha_registro = $fecha['mday']."/".$fecha['month']."/".$fecha['year']." ".$fecha['hours'].":".$fecha['minutes'].":".$fecha['seconds'];
  	if ($_GET['option']==0) {
  	  $expe = $_POST['expediente'];
  	  $pieza = $_POST['pieza'];
  	  $data = $expediente->consultar_pieza_expediente($pieza, $expe);
  	  $registro=$solicitud->registrar_solicitud_int($fecha_registro, $_SESSION['id'], $data[0]['pieza'], $_SESSION['ubicacion']);
      $log = "Solicito la pieza: ".$_POST['pieza']." del expediente: ".$_POST['expediente'];
      $sistem->registrar_log($_SESSION['id'], $_SESSION['IP'], $log);
  	  echo $registro;
  	}else{
  		$solicitante=$solicitud->consultar_solicitante_externo($_POST['nac'], $_POST['ci']);
  		if ($solicitante==NULL) {
  			$registro=$solicitud->registrar_solicitante_externo($_POST['ci'], $_POST['nombre'], $_POST['apellido'], $_POST['nac']);
	  		if ($registro==true) {
	  			$solicitante=$solicitud->consultar_solicitante_externo($_POST['nac'], $_POST['ci']);
	  			$data = $expediente->consultar_pieza_expediente($_POST['pieza'], $_POST['expediente']);
	  			$registro=$solicitud->registrar_solicitud_ext($fecha_registro, $solicitante[0]['id'], $data[0]['pieza'], 10);
          $log = "Solicito la pieza: ".$_POST['pieza']." del expediente: ".$_POST['expediente'];
          $sistem->registrar_log($_SESSION['id'], $_SESSION['IP'], $log);
	  		}else{
          $log = "Error al realizar solicitud externa  de pieza ";
          $sistem->registrar_log($_SESSION['id'], $_SESSION['IP'], $log);
	  			echo "Error, Problema al registrar solicitante";
	  		}
  		}else{
			$data = $expediente->consultar_pieza_expediente($_POST['pieza'], $_POST['expediente']);
  			$registro=$solicitud->registrar_solicitud_ext($fecha_registro, $solicitante[0]['id'], $data[0]['pieza'], 10);
        $log = "Solicito la pieza: ".$_POST['pieza']." del expediente: ".$_POST['expediente'];
        $sistem->registrar_log($_SESSION['id'], $_SESSION['IP'], $log);
	  	}
  		echo $registro;
  	}  
?>