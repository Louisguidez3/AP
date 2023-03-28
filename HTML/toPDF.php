<?php



$ddate = "2012-10-18";
$date = new DateTime($ddate);
$week = $date->format("W");
echo "Weeknummer: $week";


/*
require('../FPDF/fpdf.php');

$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'Hello World!');
$pdf->output();*/
?>