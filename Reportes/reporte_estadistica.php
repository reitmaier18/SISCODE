<?php 
	session_start();
	require '../Modelo/PDF.php';
	require '../Modelo/cnx.php';
	require '../Modelo/expediente.php';
    require '../Modelo/solicitud.php';
    $pdf = new PDF();
    $db = new db();
    $db->_construct();
    $expediente = new expediente();
    $solicitud = new solicitud();
    $data=$expediente->estadistica_expediente_reporte_por_fecha($_GET['desde'], $_GET['hasta']);
    $dat=$solicitud->estadistica_solicitudes_tramitadas_por_tiempo($_GET['desde'], $_GET['hasta']);
    $fila=0;
    $pdf->AddPage('', 'letter');//Crea la pagina
	$pdf->SetFont('Arial', 'B', 16);
	$pdf->Cell(0, 10, 'Reporte de actividades realizadas desde: '.$_GET['desde'].' hasta: '.$_GET['hasta'], 0, 1, 'C');
	$pdf->SetFillColor(0,0,0);
	$pdf->SetTextColor(250, 235, 215);
	$pdf->SetFont('Arial', 'B', 12);
	$pdf->Cell(25);
	$pdf->Cell(20, 6, '#', 1, 0, 'C', 1);
	$pdf->Cell(80, 6, 'Actividad', 1, 0, 'C', 1);
	$pdf->Cell(40, 6, 'Cantidad', 1, 1, 'C', 1);
	$pdf->SetFillColor(232,232,232);
	$pdf->SetTextColor(0, 0, 0);
	$pdf->SetFont('Arial', '', 10);
	for ($i=0; $i < 2; $i++) { 
    	$fila++;
    	$pdf->Cell(25);
    	$pdf->Cell(20, 6, $fila, 1, 0, 'C', 1);
    	switch ($fila) {
    		case '1':
    			$pdf->Cell(80, 6, 'Expedientes procesados', 1, 0, 'C', 1);
    			$pdf->Cell(40, 6, $data[0]['count'], 1, 1, 'C', 1);
    			break;
    		
    		case '2':
    			$pdf->Cell(80, 6, 'Solicitudes tramitadas', 1, 0, 'C', 1);
    			$pdf->Cell(40, 6, $dat[0]['count'], 1, 1, 'C', 1);
    			break;
    	}
    	
    }

	$pdf->Output('D');
?>