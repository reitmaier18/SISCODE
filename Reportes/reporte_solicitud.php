<?php 
	session_start();
	require '../Modelo/PDF.php';
	require '../Modelo/cnx.php';
	require '../Modelo/solicitud.php';
	require '../Modelo/sistem.php';
	$pdf = new PDF();
	$db = new db();
    $db->_construct();
	$solicitud = new solicitud();
	$sistem = new sistem();
	$data = $solicitud->listar_solicitudes_tramitadas_por_tiempo($_GET['desde'], $_GET['hasta']);
	$fila=0;
	$pdf->AddPage('', 'letter');//Crea la pagina
	$pdf->SetFont('Arial', 'B', 16);
	$pdf->Cell(0, 10, 'Reporte de solicitudes procesadas desde: '.$_GET['desde'].' hasta: '.$_GET['hasta'], 0, 1, 'C');
	$pdf->SetFillColor(0,0,0);
	$pdf->SetTextColor(250, 235, 215);
	$pdf->SetFont('Arial', 'B', 12);
	$pdf->Cell(2);
	$pdf->Cell(20, 6, '#', 1, 0, 'C', 1);
	$pdf->Cell(30, 6, 'Fecha', 1, 0, 'C', 1);
	$pdf->Cell(40, 6, 'Solicitante', 1, 0, 'C', 1);
	$pdf->Cell(20, 6, 'Tipo', 1, 0, 'C', 1);
	$pdf->Cell(40, 6, 'Expediente', 1, 0, 'C', 1);
	$pdf->Cell(20, 6, 'Pieza', 1, 0, 'C', 1);
	$pdf->Cell(30, 6, 'Dependencia', 1, 1, 'C', 1);
	$pdf->SetFillColor(232,232,232);
	$pdf->SetTextColor(0, 0, 0);
	
	for ($i=0; $i < count($data); $i++) { 
		$fila++;
		$pdf->Cell(2);
		$pdf->Cell(20, 6, $fila, 1, 0, 'C', 1);
		$pdf->Cell(30, 6, $data[$i]['fecha'], 1, 0, 'C', 1);
		$pdf->Cell(40, 6, utf8_decode($data[$i]['nombre']." ".$data[$i]['apellido']), 1, 0, 'C', 1);
		$pdf->Cell(20, 6, $data[$i]['tipo'], 1, 0, 'C', 1);
		$pdf->Cell(40, 6, $data[$i]['numero_expediente'], 1, 0, 'C', 1);
		$pdf->Cell(20, 6, $data[$i]['numero_pieza'], 1, 0, 'C', 1);
		$pdf->Cell(30, 6, utf8_decode($data[$i]['ubicacion']), 1, 1, 'C', 1);
		
	}
	$log = "Imprimio reporte de solicitudes";
    $sistem->registrar_log($_SESSION['id'], $_SESSION['IP'], $log);
    $pdf->Output('D');
?>