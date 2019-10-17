<?php 
	session_start();
	require '../Modelo/cnx.php';
	require '../Modelo/solicitud.php';
	$db = new db();
    $db->_construct();
	$solicitud = new solicitud();
	$fila=0;
	switch ($_SESSION['rol']) {
		case 'Administrador':
				
			$dat = $solicitud->listar_solicitud_admin_ext();
			$data = $solicitud->listar_solicitud_admin_int();
			if ($dat!=NULL) {
				for ($i=0; $i < count($dat); $i++) { 
					$fila++;
					echo "<tr id='".($fila)."'>";
					echo "<td>".($fila)."</td>";
					echo "<td class='oc'>".$dat[$i]['id']."</td>";
					echo "<td>".$dat[$i]['fecha']." (".$dat[$i]['hora'].":".$dat[$i]['minuto'].":".$dat[$i]['segundo'].")</td>";
					echo "<td>".$dat[$i]['nombre']." ".$dat[$i]['apellido']."</td>";
					echo "<td>".$dat[$i]['tipo']."</td>";
					echo "<td>".$dat[$i]['numero_expediente']."</td>";
					echo "<td>".$dat[$i]['numero_pieza']."</td>";
					echo "<td>".$dat[$i]['ubicacion']."</td>";
					switch ($dat[$i]['estatus']) {
						case '0':
							echo "<td>Iniciado</td>";
							break;
						case '1':
							echo "<td>Aprobado</td>";
							break;
						case '2':
							echo "<td>Tramitando</td>";
							break;	
					}
					
					echo "<td><i class='img-table-acceptar' title='Aprobar prestamo'></i><i class='img-table-cancelar' title='Cancelar solicitud'></i></td>";
					echo "</tr>";
				}
			}
			if ($data!=NULL) {
				for ($i=0; $i < count($data); $i++) { 
					$fila++;
					echo "<tr id='".($fila)."'>";
					echo "<td>".($fila)."</td>";
					echo "<td class='oc'>".$data[$i]['id']."</td>";
					echo "<td>".$data[$i]['fecha']." (".$data[$i]['hora'].":".$data[$i]['minuto'].":".$data[$i]['segundo'].")</td>";
					echo "<td>".$data[$i]['nombre']." ".$data[$i]['apellido']."</td>";
					echo "<td>".$data[$i]['tipo']."</td>";
					echo "<td>".$data[$i]['numero_expediente']."</td>";
					echo "<td>".$data[$i]['numero_pieza']."</td>";
					echo "<td>".$data[$i]['ubicacion']."</td>";
					switch ($data[$i]['estatus']) {
						case '0':
							echo "<td>Iniciado</td>";
							break;
						case '1':
							echo "<td>Aprobado</td>";
							break;
						case '2':
							echo "<td>Tramitando</td>";
							break;	
					}
					echo "<td><i class='img-table-acceptar' title='Aprobar prestamo'></i><i class='img-table-cancelar' title='Cancelar solicitud'></i></td>";
					echo "</tr>";
				}
			}
			
			break;
		
		case 'Archivista':
			$dat = $solicitud->listar_solicitud_admin_ext();
			$data = $solicitud->listar_solicitud_archivista_int($_SESSION['id']);
			if ($dat!=NULL) {
				for ($i=0; $i < count($dat); $i++) { 
					$fila++;
					echo "<tr id='".($fila)."'>";
					echo "<td>".($fila)."</td>";
					echo "<td class='oc'>".$dat[$i]['id']."</td>";
					echo "<td>".$dat[$i]['fecha']." (".$dat[$i]['hora'].":".$dat[$i]['minuto'].":".$dat[$i]['segundo'].")</td>";
					echo "<td>".$dat[$i]['nombre']." ".$dat[$i]['apellido']."</td>";
					echo "<td>".$dat[$i]['tipo']."</td>";
					echo "<td>".$dat[$i]['numero_expediente']."</td>";
					echo "<td>".$dat[$i]['numero_pieza']."</td>";
					echo "<td>".$dat[$i]['ubicacion']."</td>";
					switch ($dat[$i]['estatus']) {
						case '0':
							echo "<td>Iniciado</td>";
							break;
						case '1':
							echo "<td>Aprobado</td>";
							break;
						case '2':
							echo "<td>Tramitando</td>";
							break;	
					}
					echo "<td><i class='img-table-cancelar' title='Cancelar solicitud'></i></td>";
					echo "</tr>";
				}
			}
			if ($data!=NULL) {
				for ($i=0; $i < count($data); $i++) { 
					$fila++;
					echo "<tr id='".($fila)."'>";
					echo "<td>".($fila)."</td>";
					echo "<td class='oc'>".$data[$i]['id']."</td>";
					echo "<td>".$data[$i]['fecha']." (".$data[$i]['hora'].":".$data[$i]['minuto'].":".$data[$i]['segundo'].")</td>";
					echo "<td>".$data[$i]['nombre']." ".$data[$i]['apellido']."</td>";
					echo "<td>".$data[$i]['tipo']."</td>";
					echo "<td>".$data[$i]['numero_expediente']."</td>";
					echo "<td>".$data[$i]['numero_pieza']."</td>";
					echo "<td>".$data[$i]['ubicacion']."</td>";
					switch ($data[$i]['estatus']) {
						case '0':
							echo "<td>Iniciado</td>";
							break;
						case '1':
							echo "<td>Aprobado</td>";
							break;
						case '2':
							echo "<td>Tramitando</td>";
							break;	
					}
					echo "<td><i class='img-table-cancelar' title='Cancelar solicitud'></i></td>";
					echo "</tr>";
				}
			}
			
			break;
		
		case 'Alguacil':
			$dat = $solicitud->listar_solicitud_alguacil_ext();
			$data = $solicitud->listar_solicitud_alguacil_int();
			if ($dat!=NULL) {
				for ($i=0; $i < count($dat); $i++) { 
					$fila++;
					echo "<tr id='".($fila)."'>";
					echo "<td>".($fila)."</td>";
					echo "<td class='oc'>".$dat[$i]['id']."</td>";
					echo "<td>".$dat[$i]['fecha']." (".$dat[$i]['hora'].":".$dat[$i]['minuto'].":".$dat[$i]['segundo'].")</td>";
					echo "<td>".$dat[$i]['nombre']." ".$dat[$i]['apellido']."</td>";
					echo "<td>".$dat[$i]['tipo']."</td>";
					echo "<td>".$dat[$i]['numero_expediente']."</td>";
					echo "<td>".$dat[$i]['numero_pieza']."</td>";
					echo "<td>".$dat[$i]['ubicacion']."</td>";
					switch ($dat[$i]['estatus']) {
						case '0':
							echo "<td>Iniciado</td>";
							break;
						case '1':
							echo "<td>Aprobado</td>";
							break;
						case '2':
							echo "<td>Tramitando</td>";
							break;	
					}
					echo "<td></td>";
					echo "</tr>";
				}
			}
			if ($data!=NULL) {
				for ($i=0; $i < count($data); $i++) { 
					$fila++;
					echo "<tr id='".($fila)."'>";
					echo "<td>".($fila)."</td>";
					echo "<td class='oc'>".$data[$i]['id']."</td>";
					echo "<td>".$data[$i]['fecha']." (".$data[$i]['hora'].":".$data[$i]['minuto'].":".$data[$i]['segundo'].")</td>";
					echo "<td>".$data[$i]['nombre']." ".$data[$i]['apellido']."</td>";
					echo "<td>".$data[$i]['tipo']."</td>";
					echo "<td>".$data[$i]['numero_expediente']."</td>";
					echo "<td>".$data[$i]['numero_pieza']."</td>";
					echo "<td>".$data[$i]['ubicacion']."</td>";
					switch ($data[$i]['estatus']) {
						case '0':
							echo "<td>Iniciado</td>";
							break;
						case '1':
							echo "<td>Aprobado</td>";
							break;
						case '2':
							echo "<td>Tramitando</td>";
							break;	
					}
					echo "<td></td>";
					echo "</tr>";
				}	# code...
			}
			
			break;
		
		case 'Jefe de archivo':
			$dat = $solicitud->listar_solicitud_admin_ext();
			$data = $solicitud->listar_solicitud_archivista_int($_SESSION['id']);
			if ($dat!=NULL) {
				for ($i=0; $i < count($dat); $i++) { 
					$fila++;
					echo "<tr id='".($fila)."'>";
					echo "<td>".($fila)."</td>";
					echo "<td class='oc'>".$dat[$i]['id']."</td>";
					echo "<td>".$dat[$i]['fecha']." (".$dat[$i]['hora'].":".$dat[$i]['minuto'].":".$dat[$i]['segundo'].")</td>";
					echo "<td>".$dat[$i]['nombre']." ".$dat[$i]['apellido']."</td>";
					echo "<td>".$dat[$i]['tipo']."</td>";
					echo "<td>".$dat[$i]['numero_expediente']."</td>";
					echo "<td>".$dat[$i]['numero_pieza']."</td>";
					echo "<td>".$dat[$i]['ubicacion']."</td>";
					switch ($dat[$i]['estatus']) {
						case '0':
							echo "<td>Iniciado</td>";
							break;
						case '1':
							echo "<td>Aprobado</td>";
							break;
						case '2':
							echo "<td>Tramitando</td>";
							break;	
					}
					echo "<td><i class='img-table-acceptar' title='Aprobar prestamo'></i> <i class='img-table-cancelar' title='Cancelar solicitud'></i></td>";
					echo "</tr>";
				}
			}
			if ($data!=NULL) {
				for ($i=0; $i < count($data); $i++) { 
					$fila++;
					echo "<tr id='".($fila)."'>";
					echo "<td>".($fila)."</td>";
					echo "<td class='oc'>".$data[$i]['id']."</td>";
					echo "<td>".$data[$i]['fecha']." (".$data[$i]['hora'].":".$data[$i]['minuto'].":".$data[$i]['segundo'].")</td>";
					echo "<td>".$data[$i]['nombre']." ".$data[$i]['apellido']."</td>";
					echo "<td>".$data[$i]['tipo']."</td>";
					echo "<td>".$data[$i]['numero_expediente']."</td>";
					echo "<td>".$data[$i]['numero_pieza']."</td>";
					echo "<td>".$data[$i]['ubicacion']."</td>";
					switch ($data[$i]['estatus']) {
						case '0':
							echo "<td>Iniciado</td>";
							break;
						case '1':
							echo "<td>Aprobado</td>";
							break;
						case '2':
							echo "<td>Tramitando</td>";
							break;	
					}
					echo "<td><i class='img-table-acceptar' title='Aprobar prestamo'></i> <i class='img-table-cancelar' title='Cancelar solicitud'></i></td>";
					echo "</tr>";
				}
			}
			
			break;
		
		case 'Juez':
			$data = $solicitud->listar_solicitud_juez($_SESSION['id']);
			if ($data!=NULL) {
				for ($i=0; $i < count($data); $i++) { 
					$fila++;
					echo "<tr id='".($fila)."'>";
					echo "<td>".($fila)."</td>";
					echo "<td class='oc'>".$data[$i]['id']."</td>";
					echo "<td>".$data[$i]['fecha']." (".$data[$i]['hora'].":".$data[$i]['minuto'].":".$data[$i]['segundo'].")</td>";
					echo "<td>".$data[$i]['nombre']." ".$data[$i]['apellido']."</td>";
					echo "<td>".$data[$i]['tipo']."</td>";
					echo "<td>".$data[$i]['numero_expediente']."</td>";
					echo "<td>".$data[$i]['numero_pieza']."</td>";
					echo "<td>".$data[$i]['ubicacion']."</td>";
					switch ($data[$i]['estatus']) {
						case '0':
							echo "<td>Iniciado</td>";
							break;
						case '1':
							echo "<td>Aprobado</td>";
							break;
						case '2':
							echo "<td>Tramitando</td>";
							break;	
					}
					echo "<td><i class='img-table-cancelar' title='Cancelar solicitud'></i></td>";
					echo "</tr>";
				}
			}
			
			break;
			

		default:
			die();
			break;
	}
	
?>