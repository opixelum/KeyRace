<?php

require('../../includes/fpdf184/fpdf.php');


// $text ="Pseudo : " . $_GET["pseudo"] . "Prenom : " . $_GET["name"]

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,$text);
$pdf->Output();

?>
