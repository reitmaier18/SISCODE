<?php 
	session_start();
	require '../Modelo/PDF.php';
	require '../Modelo/cnx.php';
    require '../Modelo/expediente.php';
    require '../Modelo/tribunal.php';
    require '../Modelo/sistem.php';
	$pdf = new PDF();
	$db = new db();
    $db->_construct();
	$expediente = new expediente();
    $tribunal = new tribunal();
    $sistem = new sistem();
	$data = $expediente->listado_expediente_reporte_por_fecha($_GET['desde'], $_GET['hasta']);
	$fila=0;
	$pdf->AddPage('L', 'letter');//Crea la pagina
	$pdf->SetFont('Arial', 'B', 16);
	$pdf->Cell(0, 10, 'Reporte de expedientes registrados desde: '.$_GET['desde'].' hasta: '.$_GET['hasta'], 0, 1, 'C');
	$pdf->SetFillColor(0,0,0);
	$pdf->SetTextColor(250, 235, 215);
	$pdf->SetFont('Arial', 'B', 12);
	$pdf->Cell(1);
	$pdf->Cell(20, 6, '#', 1, 0, 'C', 1);
	$pdf->Cell(30, 6, 'Fecha', 1, 0, 'C', 1);
	$pdf->Cell(40, 6, 'Expediente', 1, 0, 'C', 1);
	$pdf->Cell(30, 6, utf8_decode('Cédula'), 1, 0, 'C', 1);
	$pdf->Cell(50, 6, 'Nombre', 1, 0, 'C', 1);
	$pdf->Cell(40, 6, 'Estado', 1, 0, 'C', 1);
	$pdf->Cell(51, 6, 'Tribunal', 1, 1, 'C', 1);
	$pdf->SetFillColor(232,232,232);
	$pdf->SetTextColor(0, 0, 0);
	$pdf->SetFont('Arial', '', 10);
	for ($i=0; $i < count($data); $i++) { 
		$fila++;
		$pdf->Cell(1);
		$pdf->Cell(20, 6, $fila, 1, 0, 'C', 1);
		$pdf->Cell(30, 6, $data[$i]['fecha_expediente'], 1, 0, 'C', 1);
		$pdf->Cell(40, 6, $data[$i]['numero_expediente'], 1, 0, 'C', 1);
		if ($data[$i]['nacionalidad']==1) {
    		$pdf->Cell(30, 6, 'V-'.$data[$i]['cedula_acusado'], 1, 0, 'C', 1);
    	}else{
    		$pdf->Cell(30, 6, 'E-'.$data[$i]['cedula_acusado'], 1, 0, 'C', 1);;
    	}
		$pdf->Cell(50, 6, utf8_decode($data[$i]['nombre_acusado']." ".$data[$i]['apellido_acusado']), 1, 0, 'C', 1);
		$pdf->Cell(40, 6, utf8_decode($data[$i]['estado']), 1, 0, 'C', 1);
		$pdf->Cell(51, 6, utf8_decode($data[$i]['tribunal']), 1, 1, 'C', 1);
		
	}
	$log = "Imprimio reporte de expedientes";
    $sistem->registrar_log($_SESSION['id'], $_SESSION['IP'], $log);
    $pdf->Output('D');
?>