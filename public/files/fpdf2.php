<?php
	$imprimir = utf8_decode("FPDF_2 " . $nombre . ' ' . $apellidos); // Con utf8_decode() corregimos caracteres
	$this->_fpdf->AddPage();
    $this->_fpdf->SetFont('Arial','B',16);
    $this->_fpdf->Cell(40,10, $imprimir);
    $this->_fpdf->Output();
?>