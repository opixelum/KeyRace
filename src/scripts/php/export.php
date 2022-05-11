<?php
session_start();

// Connect to db
include('db_connect.php');

// Get all from informations from user
$q = 'SELECT id, username, email, keyboard FROM USER WHERE id = ' . $_SESSION['id'];
$req = $db->query($q);
$results = $req->fetchAll(PDO::FETCH_ASSOC);

require('../../includes/fpdf184/fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(100,10,"My KeyRace account",0,1);
$pdf->SetFont('Arial','N',12);
$pdf->Cell(100,10,"Username : " . $results["username"],0,1);
$pdf->Cell(100,10,"Email : " . $results["email"],0,1);
$pdf->Cell(100,10,"keyboard : " . $results["keyboard"],0,1);

$pdf->Output();
?>
