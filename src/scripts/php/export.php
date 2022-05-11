<?php
session_start();

// Connect to db
include('db_connect.php');

// Get all from informations from user
$q = 'SELECT * FROM USER WHERE id = ' . $_SESSION['id'];
$req = $db->query($q);
$users = $req->fetchAll(PDO::FETCH_ASSOC);

$q = 'SELECT * FROM ASSETS WHERE user_id = ' . $_SESSION['id'];
$req = $db->query($q);
$assets = $req->fetchAll(PDO::FETCH_ASSOC);

$q = 'SELECT * FROM STATS WHERE user_id = ' . $_SESSION['id'];
$req = $db->query($q);
$stats = $req->fetchAll(PDO::FETCH_ASSOC);

require('../../includes/fpdf184/fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(200,7,"My KeyRace account",0,1,'C');

// User
$pdf->Cell(100,7," ",0,1);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(100,7,"User :",0,1);
$pdf->SetFont('Arial','',12);
$pdf->Cell(100,7,"Id : " . $users[0]["id"],0,1);
$pdf->Cell(100,7,"Username : " . $users[0]["username"],0,1);
$pdf->Cell(100,7,"Email : " . $users[0]["email"],0,1);
$pdf->Cell(100,7,"Keyboard : " . $users[0]["keyboard"],0,1);
$pdf->Cell(100,7,"Ckey : " . $users[0]["ckey"],0,1);
$pdf->Cell(100,7,"Role : " . $users[0]["role"],0,1);

// Assets
$pdf->Cell(100,7," ",0,1);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(100,7,"Assets :",0,1);
$pdf->SetFont('Arial','',12);
$pdf->Cell(100,7,"User_id : " . $assets[0]["user_id"],0,1);
$pdf->Cell(100,7,"Helmet : " . $assets[0]["helmet"],0,1);
$pdf->Cell(100,7,"Visor : " . $assets[0]["visor"],0,1);
$pdf->Cell(100,7,"Vest : " . $assets[0]["vest"],0,1);
$pdf->Cell(100,7,"Background : " . $assets[0]["background"],0,1);
$pdf->Cell(100,7,"Car : " . $assets[0]["car"],0,1);
$pdf->Cell(100,7,"Banner : " . $assets[0]["banner"],0,1);

// Stats
$pdf->Cell(100,7," ",0,1);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(100,7,"Stats :",0,1);
$pdf->SetFont('Arial','',12);
$pdf->Cell(100,7,"User_id : " . $stats[0]["user_id"],0,1);
$pdf->Cell(100,7,"Highest_wpm : " . $stats[0]["highest_wpm"],0,1);
$pdf->Cell(100,7,"Races_ran : " . $stats[0]["races_ran"],0,1);
$pdf->Cell(100,7,"Races_won : " . $stats[0]["races_won"],0,1);
$pdf->Cell(100,7,"Quest : " . $stats[0]["quest"],0,1);
$pdf->Cell(100,7,"Achievements : " . $stats[0]["achievements"],0,1);
$pdf->Cell(100,7,"Time_played : " . $stats[0]["time_played"],0,1);

$pdf->Output();
?>
