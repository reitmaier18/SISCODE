<?php 
			require '../Modelo/PDF.php';
			require '../Modelo/cnx.php';
			require '../Modelo/sistem.php';
			$pdf = new PDF();
			$db = new db();
		    $db->_construct();
		    $sistem = new sistem();
		    $data = $sistem->imprimir_log();
		    $fila=0;
		    $pdf->AddPage('', 'letter');//Crea la pagina
			$pdf->SetFont('Arial', 'B', 16);
			$pdf->Cell(0, 10, 'Reporte de log del sistema', 0, 1, 'C');
			$pdf->SetFillColor(0,0,0);
			$pdf->SetTextColor(250, 235, 215);
			$pdf->SetFont('Arial', 'B', 12);
			$pdf->Cell(2);
			$pdf->Cell(20, 6, '#', 1, 0, 'C', 1);
			$pdf->Cell(30, 6, 'Fecha', 1, 0, 'C', 1);
			$pdf->Cell(40, 6, 'Usuario', 1, 0, 'C', 1);
			$pdf->Cell(20, 6, 'IP', 1, 0, 'C', 1);
			$pdf->Cell(90, 6, utf8_decode('Descripción'), 1, 1, 'C', 1);
			$pdf->SetFillColor(232,232,232);
			$pdf->SetTextColor(0, 0, 0);
			for ($i=0; $i < count($data); $i++) { 
		        $fila++;
		        $pdf->Cell(2);
				$pdf->Cell(20, 6, $fila, 1, 0, 'C', 1);
				$pdf->Cell(30, 6, $data[$i]['fecha'], 1, 0, 'C', 1);
				$pdf->Cell(40, 6, utf8_decode($data[$i]['nombre']." ".$data[$i]['apellido']), 1, 0, 'C', 1);
				$pdf->Cell(20, 6, $data[$i]['ip'], 1, 0, 'C', 1);
				$pdf->Cell(90, 6, utf8_decode($data[$i]['descripcion']), 1, 1, '', 1);   
		        /*
		        $start_x=$pdf->GetX(); //initial x (start of column position) 
				$start_y=$pdf->GetY();
				$current_y = $pdf->GetY(); 
				$current_x = $pdf->GetX(); 

				 //define cell width 
				$ancho_celda=6; //define cell height 
		        $pdf->Cell(2);
		        $pdf->MultiCell(20, $ancho_celda, $fila, 1, 0, 'C', 1);
				$current_x+=22;
				$pdf->SetXY($current_x, $start_y);
				$pdf->MultiCell(30, $ancho_celda, $data[$i]['fecha'], 1, 0, 'C', 1);
				$current_x+=30;
				$pdf->SetXY($current_x, $start_y);  
				$pdf->MultiCell(40, $ancho_celda, utf8_decode($data[$i]['nombre']." ".$data[$i]['apellido']), 1, 0, 'C', 1);
				$current_x+=40;
				$pdf->SetXY($current_x, $start_y);  
				$pdf->MultiCell(20, $ancho_celda, $data[$i]['ip'], 1, 0, 'C', 1);
				$current_x+=20;
				$pdf->SetXY($current_x, $start_y);  
				$pdf->MultiCell(90, $ancho_celda, utf8_decode($data[$i]['descripcion']), 1, 1, 'C', 1);
				*/
				   
		        
		    }
			/*
			$pdf->Cell(40);
			$pdf->Cell(60, 0, '', 0, 0, 'C', 1);	
			$pdf->Cell(10, 6, 'Reg', 1, 0, 'C', 1);
			$pdf->Cell(10, 6, 'Met', 1, 0, 'C', 1);
			$pdf->Cell(10, 6, 'Reg', 1, 0, 'C', 1);
			$pdf->Cell(10, 6, 'Met', 1, 0, 'C', 1);
			$pdf->Cell(10, 6, 'Reg', 1, 0, 'C', 1);
			$pdf->Cell(10, 6, 'Met', 1, 1, 'C', 1);
			*/
			$pdf->Output('D');
?>