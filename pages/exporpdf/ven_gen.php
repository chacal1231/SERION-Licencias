<?php
require('../../inc/config.php');
require '../../inc/seguridad.php';

ob_end_clean();
require('../../inc/fpdf/fpdf.php');

$usuario=$_GET['u'];
$fechai=$_GET['f1'];
$fechaf=$_GET['f2'];
$monto=number_format($_GET['p'],0);

$pdf = new FPDF();
$pdf->AddPage();
$pdf->Ln(7);
$pdf->Image('../../backend/images/logo.png' , 10 ,8, 40 , 17,'PNG');

// Inicio encabezado
$pdf->Cell(80, 10, '', 0);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(40, 10, 'Grupo SITEL S.A.S', 0);
$pdf->Cell(35, 8, '', 0);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(50, 10, 'Fecha: '.date('d-m-Y').'', 0);
$pdf->Ln(7);
$pdf->Cell(85, 8, '', 0);
$pdf->Cell(30, 8, 'Nit: 900 706 948-2', 0);
$pdf->Ln(15);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(55, 8, '', 0);
$pdf->Cell(88, 8, 'Reporte de ventas WiFi - Grupo SITEL S.A.S', 0);

// Inicio tabla
$pdf->Ln(23);
$pdf->Cell(47, 8, '', 0);
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetFillColor(230,230,230);
$pdf->SetDrawColor(221,221,221);
$pdf->SetTextColor(120,120,120);
$pdf->Cell(50, 15, (' Usuario/Sucursal:'),1,0,'',true);
$pdf->Cell(50, 15,$usuario, 1,0,'',true);
$pdf->Ln(15);
$pdf->Cell(47, 8, '', 0);
$pdf->SetFillColor(250,250,250);
$pdf->SetDrawColor(221,221,221);
$pdf->Cell(50, 15, ' Ventas desde:', 1,0,'',true);
$pdf->Cell(50, 15,$fechai, 1,0,'',true);
$pdf->Ln(15);
$pdf->Cell(47, 8, '', 0);
$pdf->SetFillColor(230,230,230);
$pdf->SetDrawColor(221,221,221);
$pdf->Cell(50, 15, ' Ventas hasta:', 1,0,'',true);
$pdf->Cell(50, 15,$fechaf, 1,0,'',true);
$pdf->Ln(15);
$pdf->Cell(47, 8, '', 0);
$pdf->SetFillColor(250,250,250);
$pdf->SetDrawColor(221,221,221);
$pdf->Cell(50, 15, ' Total vendido:', 1,0,'',true);
$pdf->SetTextColor(255,0,0);
$pdf->Cell(50, 15,"$monto Pesos", 1,0,'',true);


$pdf->SetFont('Arial', 'B', 8);
$pdf->Output();
?>
