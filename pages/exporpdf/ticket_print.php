<?php
require '../../inc/seguridad.php';
require('../../inc/config.php');

ob_end_clean();
require('../../inc/fpdf/fpdf.php');

$usuario=$_GET['u'];
$contraseña=$_GET['p'];
$plan=$_GET['p'];
$precio=$_GET['p_c'];
$tiempo=$_GET['t'];


$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);
$pdf->Image('../../backend/images/tarjeta.png' , 10 ,8,80,50,'PNG');

/* Inicio encabezado */

$pdf->Cell(18, 10, '', 0);
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetFillColor(220,220,220);
$pdf->SetTextColor(9,124,30);
$pdf->Cell(40, 8, utf8_decode('INTERNET PREPAGO'),0,0,'C',true);

/* Fin encabezado */

/* Inicio Comentario */

$pdf->SetFont('Arial', '', 9);
$pdf->SetFillColor(220,220,220);
$pdf->SetDrawColor(255,0,255);
$pdf->SetTextColor(0,0,0);
$pdf->Ln(7);
$pdf->Cell(5, 8, '', 0);
$pdf->Cell(30, 8, 'Conectese a la red WiFi mas cercana y abra su', 0);
$pdf->Ln(3);
$pdf->Cell(5, 8, '', 0);
$pdf->Cell(30, 8, 'navegador e ingrese el Nombre de Usuario y', 0);
$pdf->Ln(3);
$pdf->Cell(5, 8, '', 0);
$pdf->Cell(30, 8, 'Contrasena en los campos requeridos y a ', 0);
$pdf->Ln(3);
$pdf->Cell(5, 8, '', 0);
$pdf->Cell(30, 8, 'continuacion toque o haga click en el boton',0);
$pdf->Ln(4);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(20, 8, '', 0);
$pdf->Cell(30, 8, 'Iniciar sesion', 0);

/* Fin Comentario */

/* Inicio Cajca User */
$pdf->Ln(8);
$pdf->SetFont('Arial', '', 9);
$pdf->SetFillColor(220,220,220);
$pdf->SetTextColor(9,124,30);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(5, 8, '', 0);
$pdf->Cell(18, 6,"Usuario:",0,0,'C', true);
$pdf->Cell(10, 6, '',0,0,'C',true); 
$pdf->Cell(20, 6,$usuario,0,0,'C',true);

/* Inicio Cajca tiempo */
$pdf->SetTextColor(0,0,0);
$pdf->Cell(1, 8, '', 0);
$pdf->Cell(25, 8, $tiempo,0);

/* Inicio Cajca Pass */
$pdf->Ln(7);
$pdf->SetFont('Arial', '', 9);
$pdf->SetFillColor(220,220,220);
$pdf->SetTextColor(9,124,30);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(5, 6, '', 0);
$pdf->Cell(25, 6, 'Contrasena:',0,0,'C', true);
$pdf->Cell(3, 6, '',0,0,'C', true);
$pdf->Cell(20, 6,$contraseña,0,0,'C',true);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(1, 8, '', 0);

/* Inicio Cajca Precio */
$pdf->SetTextColor(0,0,0);
$pdf->Cell(10, 8, $precio, 0);
$pdf->Cell(1, 8, '', 0);
$pdf->Cell(25, 8, 'Pesos', 0);

/* Inicio Cajca Pass */
$pdf->Ln(6);
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetTextColor(255,255,255);
$pdf->Cell(7, 8, '', 0);
$pdf->Cell(63, 8,"Para mas informacion: 311 533 4036", 0);

	
$pdf->SetFont('Arial', 'B', 8);
$pdf->Output();
?>
