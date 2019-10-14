<?php
	require '../Vista/Plugins/fpdf/fpdf.php';
	/**
	  * Clase para la creación de reportes en PDF
	  */
	 class PDF extends FPDF
	 {
	 	
	 	function Header()
	 	{
	 		$this->Image('../Vista/img/logo2.png', 5, 5, 30);
	 		$this->SetFont('Arial', 'B', 16);
	 		$this->Cell(29);
	 		$this->Cell(120, 10, utf8_decode('Jurisdicción Disciplinaria Judicial'), 0,1,'C');
	 		$this->Cell(13);
	 		$this->Cell(194, 10, utf8_decode('Sistema de Control y Distribución de Expedientes'), 0,1,'C');
	 		$this->Ln(20);
	 	}

	 	function Footer()
	 	{
	 		$this->SetY(-15);
	 		$this->SetFont('Arial', 'I', 8);
	 		$this->Cell(0, 10, utf8_decode('Jurisdicción Disciplinaria Judicial'),0,0,'C');
	 	}
	 } 
?>