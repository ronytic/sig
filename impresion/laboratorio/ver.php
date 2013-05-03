<?php
include_once("../fpdf/fpdf.php");
include_once("../../config.php");
$narchivo="laboratorio";
include_once("../../class/".$narchivo.".php");
include_once("../../class/tipolaboratorio.php");
//include_once("../../class/medico.php");
${$narchivo}=new $narchivo;
$tipolaboratorio=new tipolaboratorio;
//$medico=new medico;
extract($_GET);
$dato=array_shift(${$narchivo}->mostrar($id));
$tl=array_shift($tipolaboratorio->mostrar($dato['idtipolaboratorio']));


$pdf=new FPDF("P","mm","letter");
$pdf->SetFont("arial","B",12);
$pdf->AddPage();
escribir(50,"CLINICA QULLAYASIÑA UTA","B","C",10);
			$pdf->Ln(4);
			escribir(50,"EL ALTO - LA PAZ","","C",9);
			$pdf->Ln(3);
			escribir(50,"BOLIVIA","","C",9);
			$pdf->Ln();
$pdf->SetXY(50,15);
$pdf->SetFont("arial","B",12);
$pdf->Cell(150,10,utf8_decode($title),0,5,"C");
$pdf->SetFont("arial","UB",12);
$pdf->Cell(150,10,"Datos del Laboratorio",0,0,"C");
$pdf->Ln(15);
$pdf->Cell(190,0,"",1,10,"C");
$pdf->Ln(5);

$datos=array(	"Tipo Laboratorio"=>$tl['nombre'],
				"Nombre Análisis"=>$dato['nombreanalisis'],
				
				
				"Descripción"=>$dato['descripcion'],
				"Precio"=>$dato['precio'],
				"Observación"=>$dato['obs'],
			);

mostrarI($datos);
$pdf->Output();
?>