<?php 
	session_start();
	require '../Modelo/PDF.php';
	require '../Modelo/cnx.php';
	require '../Modelo/expediente.php';
	$pdf = new PDF();
    $db = new db();
    $db->_construct();
    $expediente = new expediente();
    $data = $expediente->inventario();
    $fila=0;
    $pdf->AddPage('', 'letter');//Crea la pagina
	$pdf->SetFont('Arial', 'B', 16);
	$pdf->Cell(0, 10, 'Inventario de Expedientes Judiciales', 0, 1, 'C');
	$pdf->SetFillColor(0,0,0);
	$pdf->SetTextColor(250, 235, 215);
	$pdf->SetFont('Arial', 'B', 12);
	$pdf->Cell(5);
	$pdf->Cell(20, 6, '#', 1, 0, 'C', 1);
	$pdf->Cell(80, 6, utf8_decode('Número de Expediente'), 1, 0, 'C', 1);
	$pdf->Cell(20, 6, utf8_decode('Pieza'), 1, 0, 'C', 1);
	$pdf->Cell(60, 6, utf8_decode('Ubicación'), 1, 1, 'C', 1);
	$pdf->SetFillColor(232,232,232);
	$pdf->SetTextColor(0, 0, 0);
	$pdf->SetFont('Arial', '', 10);
	for ($i=0; $i < count($data) ; $i++) { 
    	$fila++;
    	$pdf->Cell(5);
		$pdf->Cell(20, 6, $fila, 1, 0, 'C', 1);
		$pdf->Cell(80, 6, $data[$i]['numero_expediente'], 1, 0, 'C', 1);
		$pdf->Cell(20, 6, $data[$i]['numero_pieza'], 1, 0, 'C', 1);
		$pdf->Cell(60, 6, utf8_decode($data[$i]['ubicacion']), 1, 1, 'C', 1);
    }
	$pdf->Output('D');
?>