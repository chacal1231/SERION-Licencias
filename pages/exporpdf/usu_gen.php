<?php
require('../../inc/config.php');
require '../../inc/seguridad.php';

ob_end_clean();
require('../../inc/fpdf/fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);
$pdf->Image('../../backend/images/logo.png' , 10 ,8, 40 , 17,'PNG');
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
$pdf->Cell(88, 8, 'Listado de usuarios WiFi - Grupo SITEL S.A.S', 0);
$pdf->Ln(23);
$pdf->Cell(5, 8, '', 0);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(10, 8, 'No.', 0);
$pdf->Cell(20, 8, 'Usuario', 0);
$pdf->Cell(15, 8, 'Clave', 0);
$pdf->Cell(25, 8, 'Plan', 0);
$pdf->Cell(30, 8, 'Tiempo comprado', 0);
$pdf->Cell(20, 8, 'Precio', 0);
$pdf->Cell(30, 8, 'Fecha de ingreso', 0);
$pdf->Cell(25, 8, 'Usuario creador', 0);
$pdf->Ln(8);
$pdf->SetFont('Arial', '', 8);
//CONSULTA
$usuarios = mysqli_query($link,"SELECT * FROM usuarios ORDER BY usuario_creador");
$item = 0;
$totaluni = 0;
$totaldis = 0;
while($usuarios2 = mysqli_fetch_array($usuarios)){
	$item = $item+1;
	$pdf->Cell(5, 8, '', 0);
	$pdf->Cell(10, 8, $item, 0);
	$pdf->Cell(20, 8,$usuarios2['usuario'], 0);
	$pdf->Cell(15, 8, $usuarios2['password'], 0);
	$pdf->Cell(25, 8, $usuarios2['plan'], 0);
	$pdf->Cell(30, 8, $usuarios2['tiempo'], 0);
	$pdf->Cell(20, 8, $usuarios2['precio'], 0);
	$pdf->Cell(30, 8, $usuarios2['fecha'], 0);
	$pdf->Cell(25, 8, $usuarios2['usuario_creador'], 0);
	$pdf->Ln(8);
}
$pdf->SetFont('Arial', 'B', 8);
$pdf->Output();
?>
